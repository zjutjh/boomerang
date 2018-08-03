<?php

namespace App\Http\Controllers\Auth;

use App\Api;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function autoLogin(Request $request)
    {

        $code = $request->get('code');//从前端获取code
        $client = new Client();
        $reponse = $client->request('GET', 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.env('WECHAT_APPID').'&secret='.env('WECHAT_SECRET').'&code='.$code.'&grant_type=authorization_code', ['verify' => false]);
        $data = json_decode($reponse->getBody(), true);
        $openid = $data['openid'];
      
        if (!$openid) {
            return $this->apiReponse(-1, '用户认证失败', null);//没get到就认证失败
        }

        //查看数据库是否存在用户
        if (!$user = User::where('openid', $openid)->first()) {
            $user = User::openIdCreateUser($openid);
            if ($user === 'register') {
                return $this->apiReponse(-100, '请先绑定', null);
            }
        }
        if (!$token = Auth::login($user)) {
            return $this->apiReponse(-401, '生成token失败', null);
        }

        return $this->apiReponse(200, '登陆成功',
            ['user' => $user,
                'token' => $token]
        );

    }


    public function adminLogin(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $api = new Api();
        if (!$check = $api->checkJhPassport($username, $password)) {
            $error = $api->getError();
            return $this->apiReponse(-401, $error ? $error : '用户名或密码错误', null);
        }

        if (!$user = User::where("uno", $username)->first()) {
            if ($user->user_type > 1) {
                if (!$token = Auth::login($user)) {
                    return $this->apiReponse(-401, '生成token失败', null);
                }
                $data = [
                    'token' => $token,
                    'user' => $user
                ];
                return $this->apiReponse(200, "登录成功", $data);
            }

            return $this->apiReponse( -403, "用户无此权限登录", null);
        }

        return $this->apiReponse( -401, "用户不存在", null);

    }

    public function index(Request $request){
        $code = $request->get('code');
        $client = new Client();
        $reponse = $client->request('GET', 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.env('WECHAT_APPID').'&secret='.env('WECHAT_SECRET').'&code='.$code.'&grant_type=authorization_code', ['verify' => false]);
        $data = json_decode($reponse->getBody(), true);
        $openid = $data['openid'];
//        dd($data);
        return view('index', ['openid' => $openid]);
    }


    public function oauth() {
        return redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid='
                            .env('WECHAT_APPID')
                            .'&redirect_uri='
                            .urlencode(config('api.jh.oauth'))
                            .urlencode(env('WECHAT_REDIRECT'))
                            .'&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect');
    }

}