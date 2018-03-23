<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class MineController extends Controller
{
    public function mine(Request $request,$uid)
    {

        $items = Item::where('uid','=',$uid)
            ->select('id','title','description','lost_place','lost_type','images','phone','qq','status','created_at','updated_at')
            ->skip($request->get('page'))
            ->take(10)
            ->get();

        return  $this->apiReponse(200,null,
            ['items' => $items]);
    }
}
