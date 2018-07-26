<?php

namespace App\Http\Controllers;


use App\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller{
    public function show(){
        $message = Announcement::where('status',0)
            ->select('title','content')
            ->get();
        return $this->apiReponse(200,null,$message);
    }

    public function add(Request $request){
        $title = $request->get('title');
        $content = $request->get('content');
        $message = Announcement::where('status',0)->first();
        $message->status = 1;
        $message->save();
        Announcement::insert(
            ['title' => $title, 'content' => $content, 'status' => 0]
        );
        return $this->apiReponse(200,'添加成功',null);
    }
}


/**
 * Created by PhpStorm.
 * User: 20170
 * Date: 2018/7/23
 * Time: 21:11
 */