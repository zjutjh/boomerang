<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class DetailController extends Controller
{

    public function getDetail($id)
    {
        $item = Item::where('id',$id)->first();
        return $this->apiReponse(200,null,['item'=>$item]);
    }



    public function show($itemUid){
        $itemid = Redis::get($itemUid);
        if ( !isset($itemid)) {
            return view('item.expire');
        }
        $item = Item::where('id', $itemid)->first();
        return view('item.detail', ['item' => $item]);
    }
}