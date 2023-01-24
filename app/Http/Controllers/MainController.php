<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    //
    function index()
    {

        return view('index')->with([
            'categories' => Category::all(),
            'products' => Product::all()
        ]);
    }

    function shop(Request $request)
    {
        $query = Product::query();

        $inputs = $request->all();

        if (isset($inputs['keywords'])) {
            $query = $query->where('name', 'like', "%" . $inputs['keywords'] . "%");
        }
        if (isset($inputs['color'])) {
            if (!in_array('-1', $inputs['color'])) {

                $query = $query->whereIn('color_id', $inputs['color']);
            }
        }
        if (isset($inputs['size'])) {
            if (!in_array('-1', $inputs['size'])) {
                $query = $query->whereIn('size_id', $inputs['size']);
            }
        }

        if ($request->has('category_id')) {
            $query = $query->where('category_id', $request->get('category_id'));
        }

        if ($request->has('price')) {
            if (!in_array('-1', $inputs['price'])) {
                $query = $query->where(function ($q) use ($inputs) {
                    foreach ($inputs['price'] as $price) {
                        $q = $q->orWhereBetween('price', [$price, $price + 100]);
                    }
                });
            }
        }

        /*SELECT * FROM Products WHERE con1 and con2 and (
        price between 0 and 100 or
        price between 100 and 200
        )
        */
        $products = $query->paginate(9);

        return view('shop')->with([
            'products' => $products,
            'colors' => Color::all(),
            'sizes' => Size::all()
        ]);
    }

    function add_product(Request $request)
    {
        if ($request->has('product')) {
            $cart_products = Session::get('cart_products', []);
            array_push($cart_products, $request->get('product'));
            Session::put('cart_products', $cart_products);
            return response()->json('Data addedd successfully');
        }
        return abort(404);
    }
    function update_cart_totals(Request $request)
    {
        if ($request->has('price')) {
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
    function admin()
    {

        return view('layouts.admin');
    }
    function checkout()
    {
        return view('checkout');
    }
    function cart()
    {
        return view('cart');
    }
}