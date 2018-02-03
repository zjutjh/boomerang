<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class NewController extends Controller
{

    public function latest(Request $request)
    {
        $items = Item::latest()
            ->select('title','description','lost_place','lost_type','type_id','images','phone','qq','status')
            ->take(10)
            ->get();



        return $this->apiReponse(200,null,
            ['items'=> $items]);
    }

}
