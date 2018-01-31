<?php
/**
 * Created by PhpStorm.
 * User: 20170
 * Date: 2018/1/31
 * Time: 12:45
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Item;

class ItemSearchController extends Controller
{

    /**
     * items列表
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $items = Item::search($request->search)
                ->paginate(6);
        }else{
            $items = Item::paginate(6);
        }
        return view('item-search',compact('items'));
    }


    /**
     * 创建新的item
     */
    public function create(Request $request)
    {
        $this->validate($request,['title'=>'required']);

        $items = Item::create($request->all());
        return back();
    }
}