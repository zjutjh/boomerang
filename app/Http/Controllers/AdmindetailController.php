<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmindetailController extends Controller
{

    public function getDetail(Request $request)
    {
        $id = $request->get('id');
        $item=DB::table('items')
            ->where('id',$id)
            ->get();
        dd($item);
    }
}