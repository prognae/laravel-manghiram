<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    function allItems(Request $request) {
        dd($request->session->all());
        $itemInfo = DB::select('SELECT * FROM item;');
        
        if(!$itemInfo) {
            abort(404);
        }
        else if($itemInfo) {
            return view('items', ['user' => session()->get('username'), 'itemInfo' => $itemInfo]);
        }
    }

    function categoryItemView($category) {
        $itemCategory = DB::select('SELECT * FROM item WHERE item_category = :category', ['category' => $category]);
        
        if(!$itemCategory) {
            abort(404);
        }
        else if($itemCategory) {
            return view('items', ['user' => session()->get('username'), 'itemInfo' => $itemCategory]);
        }
    }     

    function viewItem($itemId) {
        $itemInfo = DB::select('SELECT * FROM view_item(:id)', ['id' => $itemId]);
        $mapInfo = DB::select('SELECT map_x_coordinate, map_y_coordinate, phone_num FROM profile WHERE account_id = (SELECT account_id FROM inventory WHERE item_id = :id)', ['id' => $itemId]);

        return view('item_view', ['user' => session()->get('username'), 'user_id' => session()->get('user_id'), 'itemInfo' => $itemInfo, 'mapInfo' => $mapInfo]);
    }

}
