<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    public function add(Request $request)
    {
        User::whereRaw('qq = ? or wechat = ? or phone = ?',[$request,$request,$request])
            ->update(['user_type' => 2]);
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        User::where('id',$id)
            ->update(['user_type' => 1]);
    }

    public function adminlist()
    {
        User::where('user_type',2)
            ->select('name');
    }

    public function operatinglist()
    {

    }
}