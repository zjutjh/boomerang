<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class DetailController extends Controller
{

    public function getDetail(Request $request)
    {
        $id = $request->get('id');
        $item = Item::where('id',$id)
            ->first();
        return $this->apiReponse(200,null,['item'=>$item]);
    }
}