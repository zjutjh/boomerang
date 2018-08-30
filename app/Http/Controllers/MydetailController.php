<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class MydetailController extends Controller
{
    public function Mydetail(Request $request)
    {
        $uid = $request->get('uid');
        $id = $request->get('id');
        $item=Item::whereRaw('uid = ? and id = ?', [$uid,$id])
            ->first();
        return $this->apiReponse(200,null,['item'=>$item]);
    }

    public function hasBeenFound(Request $request)
    {
        $id = $request->get('id');
        $item = Item::where('id',$id)->update(['status' => 1]);
        return $this->apiReponse(200,'已标记为已寻回',null);
    }

    public function hasBeenReceived(Request $request)
    {
        $id = $request->get('id');
        $item = Item::where('id',$id)->update(['status' => 1]);
        return $this->apiReponse(200,'已标记为已领取',null);
    }
}