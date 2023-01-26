<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CartController extends Controller
{
    function decQuantity(Request $request)
    {
        if ($request->has('id')) {
            $id = $request->get('id');
            $array = Session::get('quantity', array());
            $array[strval($id)] -= 1;
            if ($array[strval($id)] <= 0) {
                unset($array[strval($id)]);
                $ids =Session::get('ids', []);
                $ids = array_diff($ids,array($id));
                Session::put('ids', $ids);
            }
            Session::put('quantity', $array);
            return response()->json('quantity decreaced successfully');
        }
        return abort(404);

    }
    function incQuantity(Request $request)
    {
        if ($request->has('id')) {
            $id = $request->get('id');
            $array = Session::get('quantity', array());
            $array[strval($id)] += 1;
            Session::put('quantity', $array);
            return response()->json('quantity increaced successfully');
        }
        return abort(404);
    }
    function deleteLine(Request $request)
    {
        if ($request->has('id')) {
            $id = $request->get('id');
            $array = Session::get('quantity', array());
            unset($array[strval($id)]);
            Session::put('quantity', $array);
            $ids =Session::get('ids', []);
            $ids = array_diff($ids,array($id));
            Session::put('ids', $ids);
            return response()->json('product deleted from cart successfully');
        }
        return abort(404);
    }
    
}