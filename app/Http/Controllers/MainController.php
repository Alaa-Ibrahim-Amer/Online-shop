<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\newsletter;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\ErrorHandler\Collecting;

class MainController extends Controller
{
    //
    function index()
    {
        //session()->flush();
        return view('index')->with([
            'categories' => Category::all(),
            'products' => Product::all()
        ]);
    }

    function admin()
    {

        return view('layouts.admin');
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

    function details($id)
    {
        $products = Product::all();
        $theproduct = Product::findOrFail($id);
        return view('details')->with([
            'products' => $products,
            'theproduct' => $theproduct
        ]);
    }
    function checkout()
    {
        $ids = session::get('ids', []);
        $products = Product::whereIn('id', $ids)->get();
        return view('checkout')->with([
            'products' => $products,
            'ids' => $ids
        ]);
    }
    function cart()
    {
        $ids = session::get('ids', []);
        $products = Product::whereIn('id', $ids)->get();
        return view('cart')->with([
            'products' => $products,
            'ids' => $ids
        ]);
    }

    function newsletter(Request $request)
    {
        $request->validate(newsletter::$rules);
        $newsletter = new newsletter;
        $newsletter['email'] = $request->input('email');
        $newsletter->save();
        return redirect()->action([MainController::class, 'index']);
 
    }

    function loved_products_count(Request $request)
    {
        if ($request->has('id')) {
            $id = $request->get('id');
            $ids = Session::get('lovedproducts', []);
            array_push($ids, $id);
            Session::put('lovedproducts', $ids);
            return response()->json(count($ids));
        }
        return abort(404);
    }
}