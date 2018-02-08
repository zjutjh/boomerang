<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function lostList(Request $request)
    {
        //从items表里取数据
        $page = $request->get('page');
        $items = Item::latest()
            ->where('lost_type',1)
            ->select('uid','title','description','lost_place','lost_type','type_id','images','phone','qq','status')
            ->take(10)
            ->skip($page)
            ->get();


        return $this->apiReponse(200,null,
            ['items' => $items]);
    }

    public function foundList(Request $request)
    {

        //从items表里取数据
        $page = $request->get('page');
        $items = Item::latest()
            ->where('lost_type',0)
            ->select('uid','title','description','lost_place','lost_type','type_id','images','phone','qq','status')
            ->skip($page)
            ->take(10)
            ->get();

//        //判断所找到的物件是否是校园卡，如果是校园卡返回contact_uno
//        if($type_id = DB::table('items')->where('type_id','=',0)->get())
//        {
//            $item = Item::select('contact_uno')
//                ->where('type_id','=',$type_id->type_id)
//                ->first();
//            return $this->apiReponse(200,null,$item);
//        }

        return $this->apiReponse(200,null,
            ['items' => $items]);

    }
}
