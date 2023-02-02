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

    function add_product(Request $request)
    {
        if ($request->has('id')) {
            $id = $request->get('id');
            $ids =Session::get('ids', []);
            if(in_array($id,$ids)){
                $array = Session::get('quantity',array());
                $array[strval($id)]+=1;
                Session::put('quantity' , $array);
                return response()->json(count($ids));
            }
            else {
                $array = Session::get('quantity',array());
                $array[strval($id)] = 1;
                Session::put('quantity' , $array);
                array_push($ids, $request->get('id'));
                Session::put('ids', $ids);
                return response()->json(count($ids));
            }
        }
            return abort(404);
    }
    function update_cart_totals(Request $request)
    {
        if ($request->has('price')){
            $sub_total = Session::get('sub_total', 0);
            $sub_total +=  $request->get('price');
            Session::put('sub_total', $sub_total);
            $shapping = Session::get('shapping', 0);
            $shapping += 2;
            Session::put('shapping', $shapping);
            return response()->json('price updated successfully');
        }
        return abort(404);

    }

    function dec_cart_totals(Request $request)
    {
        if ($request->has('price')){
            $sub_total = Session::get('sub_total', 0);
            $sub_total -=  $request->get('price');
            Session::put('sub_total', $sub_total);
            $shapping = Session::get('shapping', 0);
            $shapping -= 2;
            Session::put('shapping', $shapping);
            return response()->json('price updated successfully');
        }
        return abort(404);
        
    }

    
    
    function add_product_q(Request $request)
    {
        if ($request->has('id')) {
            $id = $request->get('id');
            $q = $request->get('q');
            $ids =Session::get('ids', []);
            if(in_array($id,$ids)){
                $array = Session::get('quantity',array());
                $array[strval($id)]+=$q;
                Session::put('quantity' , $array);
                return response()->json(count($ids));
            }
            else {
                $array = Session::get('quantity',array());
                $array[strval($id)] = $q;
                Session::put('quantity' , $array);
                array_push($ids, $request->get('id'));
                Session::put('ids', $ids);
                return response()->json(count($ids));
            }
        }
        return abort(404);
    }
    function update_cart_totals_q(Request $request)
    {
        if ($request->has('price')){
            $q = $request->get('q');
            $sub_total = Session::get('sub_total', 0);
            $sub_total +=  $request->get('price')*$q;
            Session::put('sub_total', $sub_total);
            $shapping = Session::get('shapping', 0);
            $shapping += 2*$q;
            Session::put('shapping', $shapping);
            return response()->json('price updated successfully');
        }
        return abort(404);
        
    }

    function delete_cart_totals(Request $request)
    {
        if ($request->has('price')){
            $id = $request->get('id');
            $array = Session::get('quantity',array());
            $q=$array[strval($id)];
            $sub_total = Session::get('sub_total', 0);
            $sub_total -=  $request->get('price')* $q;
            Session::put('sub_total', $sub_total);
            $shapping = Session::get('shapping', 0);
            $shapping -= 2 * $q;
            Session::put('shapping', $shapping);
            return response()->json('price updated successfully');
        }
        return abort(404);
    }

    
    
}