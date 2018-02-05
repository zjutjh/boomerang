<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MydetailController extends Controller
{
    public function Mydetail(Request $request)
    {
        $uid = $request->get('uid');
        $id = $request->get('id');
        $item=DB::table('item')
            ->whereRaw('uid = ? and id = ?', [$uid,$id])
            ->get();
        dd($item);
    }
}