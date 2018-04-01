<?php

namespace App;

use GuzzleHttp\Client;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function isAdmin() {
        if ($this->user_type > 1) {
            return true;
        }
        return false;
    }

    public function isSuperAdmin() {
        if ($this->user_type == 3) {
            return true;
        }
        return false;
    }

    static public function openIdCreateUser($openid) {
        $client = new Client();
        $params = array(
            'openid' => $openid
        );
        $response = $client
            ->request("GET", config('api.jh.user.wejh') . "?" . http_build_query($params));//请求微精弘url
        $data = json_decode((string)$response->getBody());//对json数据进行解码，得到返回内容
        if ($data->errcode < 0) {
            return 'register';
        }

        $user = new User;
        $user->openid = $openid;
        $user->uno = $data->data->uno;
        $user->name = (!$data->data->name) ? "无名氏" : $data->data->name;
        $user->save();
        return $user;
    }




//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];
//
//    /**
//     * The attributes that should be hidden for arrays.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];
}
