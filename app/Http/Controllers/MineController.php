<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class MineController extends Controller
{
//    public function mine(Request $request,$uid)
//    {
//        $page = $request->get('page') ? $request->get('page') : 0;
//
//        $items = Item::where('uid','=',$uid)
//            ->where('deleted', 0)
//            ->select('id','title','description','lost_place','lost_type','images','phone','qq','status','created_at','updated_at')
//            ->orderBy('id', 'desc')
//            ->skip($page * 10)
//            ->take(10)
//            ->get();
//
//        return  $this->apiReponse(200,null,
//            ['items' => $items]);
//    }

    public function found(Request $request,$uid)
    {
        $page = $request->get('page') ? $request->get('page') : 0;
        $items = Item::where('uid','=',$uid)
            ->where('deleted', 0)
            ->where('lost_type',1)
            ->where('status', 1)
            ->select('id','title','description','lost_place','lost_type','images','phone','qq','status','created_at','updated_at')
            ->orderBy('id', 'desc')
            ->skip($page * 10)
            ->take(10)
            ->get();
        $count = Item::where('uid','=',$uid)
            ->where('deleted', 0)
            ->where('lost_type',1)
            ->where('status', 1)
            ->count();

        $data =  ['items' => $items,
            'count' => $count];

        return  $this->apiReponse(200,null,$data);
    }

    public function lost(Request $request,$uid)
    {
        $page = $request->get('page') ? $request->get('page') : 0;

        $items = Item::where('uid','=',$uid)
            ->where('deleted', 0)
            ->where('lost_type',0)
            ->where('status', 1)
            ->select('id','title','description','lost_place','lost_type','images','phone','qq','status','created_at','updated_at')
            ->orderBy('id', 'desc')
            ->skip($page * 10)
            ->take(10)
            ->get();

        $count = Item::where('uid','=',$uid)
            ->where('deleted', 0)
            ->where('lost_type',0)
            ->where('status', 1)
            ->count();

        $data =  ['items' => $items,
            'count' => $count];

        return  $this->apiReponse(200,null,$data);
    }

    public function unfinished(Request $request,$uid)
    {
        $page = $request->get('page') ? $request->get('page') : 0;

        $items = Item::where('uid','=',$uid)
            ->where('deleted', 0)
            ->where('status', 0)
            ->select('id','title','description','lost_place','lost_type','images','phone','qq','status','created_at','updated_at')
            ->orderBy('id', 'desc')
            ->skip($page * 10)
            ->take(10)
            ->get();

        $count = Item::where('uid','=',$uid)
            ->where('deleted', 0)
            ->where('status', 0)
            ->count();

        $data =  ['items' => $items,
            'count' => $count];

        return  $this->apiReponse(200,null,$data);
    }
}
