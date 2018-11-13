<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class MineController extends Controller
{
    public function mine(Request $request,$uid)
    {
        $page = $request->get('page') ? $request->get('page') : 0;

        $items = Item::where('uid','=',$uid)
            ->where('deleted', 0)
            ->select('id','title','description','lost_place','lost_type','typename','images','phone','qq','status','created_at','updated_at')
            ->orderBy('id', 'desc')
            ->skip($page * 10)
            ->take(10)
            ->get();

        return  $this->apiReponse(200,null,
            ['items' => $items]);
    }
}
