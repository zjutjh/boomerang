<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperadminController extends Controller
{
    public function add(Request $request)
    {
        DB::table('users')
            ->where('qq = or wechat = or phone = ',[$request,$request,$request])
            ->update(['user_type' => 2]);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        DB::table('users')
            ->where('id',$id)
            ->update(['user_type' => 1]);
    }

    public function adminlist()
    {
        DB::table('users')
            ->where('user_type',2)
            ->select('name');
    }

    public function operatinglist()
    {

    }
}