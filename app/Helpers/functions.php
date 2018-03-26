<?php
/**
 * Created by PhpStorm.
 * User: zhutianyu
 * Date: 2018/2/23
 * Time: 16:00
 */

function create_itemUid($itemId) {
    $itemUid = md5($itemId);
    \Illuminate\Support\Facades\Redis::set($itemUid, $itemId);
    \Illuminate\Support\Facades\Redis::expire($itemUid, 60 * 60 * 72);
    return env('APP_URL'). '/send/detail/'.md5($itemId);
}