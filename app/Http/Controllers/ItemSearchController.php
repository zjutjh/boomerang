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
    public function search(Request $request)
    {
//        if($request->has('')){
//            $items = Item::search($request->search)
//                ->paginate(6);
//        }else{
//            $items = Item::paginate(6);
//        }

        $items = Item::search($request->get('request'))
            ->where('deleted', 0)
            ->paginate(10);

        return $this->apiReponse(200,null,
            ['items' => $items]);    }


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