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
}