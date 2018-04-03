<?php

namespace App\Jobs;

use App\Api;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Redis;

class SendMsg implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    protected $user_auth;

    protected $itemId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Array $data, $user, $itemId)
    {
        $this->data = $data;
        $this->user_auth = $user;
        $this->itemId = $itemId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (!$user = User::where('uno', $this->data['contact_uno'])->first()) {
            $openid = Api::unoGetOpenId($this->data['contact_uno']);
            if (!$openid) {
                return;
            }
            $user = User::openIdCreateUser($openid);
            if ($user === 'register') {
                return;
            }
        }
        $haveSend = Redis::get("user-send-{$user->uno}");
        if (isset($haveSend)) {
            return;
        }

        Redis::set("user-send-{$user->uno}", '1');
        Redis::expire("user-send-{$user->uno}", 60 * 60 * 24);
        $data = array(
            'openid' => $user->openid,
            'data'   => array(
                'first' => '亲爱的'. mb_substr($user->name, 0, 1, "utf-8") . '同学你好，你的校园卡已被捡到，请认领',
                'keyword1' =>  mb_substr($this->user_auth->name, 0, 1, "utf-8") . '同学',
                'keyword2' => '电话 ' . $this->data['phone'] . ' QQ ' . $this->data['qq'],
                'remark'   => '感谢你的使用'
            ),
            'url'   => create_itemUid($this->itemId)
        );


        $client = new Client();
        $client->post(config('api.jh.send'), [
            'json' => $data
        ]);
    }
}
