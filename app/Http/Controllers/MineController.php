<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class MineController extends Controller
{
    public function mine(Request $request)
    {
        $uid = $request->get('id');
        $items = Item::where('uid','=',$uid)
            ->select('title','description','lost_place','lost_type','type_id','images','phone','qq','status','created_at','updated_at')
            ->take(10)
            ->get();

        return  $this->apiReponse(200,null,
            ['items' => $items]);
    }
}
