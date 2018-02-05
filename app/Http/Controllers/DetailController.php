<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{

    public function getDetail(Request $request)
    {
        //$id = $request->get('id');
        $id = 1;
        $item = DB::table('items')
            ->where('id',$id)
            ->first();
            //->select('id','title','description','lost_place','images','lost_type','type_id','qq','phone','status','deleted','uid','created_at','updated_at');

        $response = [
                "code" => 200,
                "error" => null,
                "data" => [
                    "item" =>
                    [
                        "id"=> $item->{'id'}, // 物品id
                        "title"=> $item->{'title'}, // 物品名称
                        "description"=> $item->{'description'}, // 描述
                        "lost_place"=> $item->{'lost_place'}, // 丢失地点
                        "images"=> $item->{'images'},// 图片
                        "lost_type"=> $item->{'lost_type'}, // 失物
                        "type"=> [
                            "id"=> 1,
                            "name"=> "校园卡",
                            "icon"=> "xxx"], // 由type_id查询而来
                        "qq"=> $item->{'qq'},
                        "phone"=> $item->{'phone'},
                        "status"=> $item->{'status'}, // 已寻回
                        "user"=> [
                        "id"=> 1,
                        "uno"=> "xxxx",
                        ],
                        "created_at"=> $item->{'created_at'},
                        "updated_at"=> $item->{'updated_at'}
                    ]
                ]
        ];
        echo response()->json($response);
    }
}