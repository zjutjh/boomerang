<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    public function RJM($code,$error,$data)
    {
        $json = [
            'code' => $code,
            'error' => $error,
            'data' => $data
        ];

        return response()->json($json);
    }

    public function autoLogin(Request $request)
    {
        $openid = $request->get('openid');//请求得到用户openid
        if (!$openid) {
            return $this->RJM(-1,null,'用户认证失败');//没get到就认证失败
        }

        //查看数据库是否存在用户
        if (!$user = User::where('openid',$openid)->first()) {
            $client = new Client();
            $response = $client
                ->request("GET", "https://server.wejh.imcr.me/api/thirdParty/login?openid=" . $openid);//请求微精弘url
            $data = json_decode((string)$response->getBody());//对json数据进行解码，得到返回内容

            $user = new User;
            $user->openid = $openid;
            $user->student_id = $data->data->uno;
//            $user->password = '1234567';
            $user->save();
        }

        return $this->RJM(1,'登陆成功',
            ['user' => $user]
        );

    }
}