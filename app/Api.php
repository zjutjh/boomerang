<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    /**
     * 这边是获取外部api的数据
     * 一般列表数据的返回请规范为
     *  [
     *      'list' => $list
     *  ]
     *  也就是另外包一层，以便以后增加新的信息
     *  另外列表数据即使字段相同也要重新转换一遍，一般转换为中文以便理解
     */
    public $error = '';
    public function setError($message) {
        $this->error = $message;
        return false;
    }
    public function getError() {
        return $this->error;
    }
    public function resetError() {
        $this->error = '';
    }

    public function checkJhPassport($user_name, $password) {
        if (!$user_name OR !$password) {
            return $this->setError('用户名或密码为空');
        }
        $url = api('jh.user', null);
        $data = [
            'app' => 'passport',
            'action' => 'login',
            'passport' => $user_name,
            'password' => ($password),
        ];
        $client = new Client();
        //if(!$content = http_get($url, $data))
        if (!$content = $client->get(config('api.jh.user.center') . "?" . http_build_query($data)))
            return $this->setError('用户中心服务器错误');
        if(!$value = json_decode((string)$content->getBody(), true)) {
            return $this->setError('用户中心服务器错误');
        }
        if(isset($value['state']) && $value['state'] == 'success') {
            return true;
        } else {
            return $this->setError('用户名或密码错误');
        }
    }
}
