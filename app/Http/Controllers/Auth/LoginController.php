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
        $openid = $request->get('openid');//请求得到用户openid
        if (!$openid) {
            return $this->apiReponse(-1, '用户认证失败', null);//没get到就认证失败
        }


        //查看数据库是否存在用户
        if (!$user = User::where('openid', $openid)->first()) {
            $client = new Client();
            $params = array(
                'openid' => $openid
            );
            $response = $client
                ->request("GET", config('api.jh.user.wejh') . "?" . http_build_query($params));//请求微精弘url
            $data = json_decode((string)$response->getBody());//对json数据进行解码，得到返回内容

            $user = new User;
            $user->openid = $openid;
            $user->uno = $data->data->uno;
            $user->name = $data->data->name;
            $user->save();
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
}