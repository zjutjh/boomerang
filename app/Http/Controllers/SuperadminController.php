<?php

namespace App\Http\Controllers;

use App\AdminLog;
use App\Item;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
    public function add(Request $request)
    {
        $this->checkSuperAdmin();

        User::where('qq = or wechat = or phone = ',[$request,$request,$request])
            ->update(['user_type' => 2]);

        return $this->apiReponse( 200, '添加成功', null);
    }

    public function delete(Request $request)
    {
        $this->checkSuperAdmin();

        $id = $request->get('id');
        User::where('id',$id)
            ->update(['user_type' => 1]);

        return $this->apiReponse( 200, '删除成功', null);


    }

    public function adminlist()
    {

        User::where('user_type',2)
            ->select('name');
    }

    public function loglist()
    {
        $logs = AdminLog::latest()
            ->get();
        return $this->apiReponse(200,null,['logs'=>$logs]);
    }

    public function checkSuperAdmin() {
        if (!$user = Auth::user()) {
            return $this->apiReponse( -400, '用户错误', null);
        }

        if (!$user->isSuperAdmin()) {
            return $this->apiReponse( -400, '权限不足', null);
        }

    }











    public function super()
    {
        $user = User::whereIn('user_type',[2,3])
            ->get();

        $itemLost = Item::latest()
            ->where('lost_type',1)
            ->select('uid','title','description','lost_place','lost_type','type_id','images','phone','qq','status')
            ->take(10)
            ->get();
        $itemFind = Item::latest()
            ->where('lost_type',0)
            ->select('uid','title','description','lost_place','lost_type','type_id','images','phone','qq','status')
            ->take(10)
            ->get();

        return $this->apiReponse(200,null,
            ['user' => $user,
                'itemLost' => $itemLost,
                'itemFind' => $itemFind]);

    }
}