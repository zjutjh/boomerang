<?php

namespace App\Http\Controllers;


use App\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller{
    public function show(){
        $message = Announcement::where('status',0)
            ->select('title','content','summary')
            ->first();
        return $this->apiReponse(200,null,$message);
    }

    public function add(Request $request){
        $title = $request->get('title');
        $content = $request->get('content');
        $summary = $request->get('summary');
        if (strlen($summary)>=20){
            $summary = substr($summary,0,20);
        }
        else{
            $summary = $summary;
        }
        $message = Announcement::where('status',0)->first();
        if ($message){
            $message->status = 1;
            $message->save();
        }
        Announcement::insert(
            ['title' => $title, 'content' => $content, 'summary' => $summary, 'status' => 0]
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