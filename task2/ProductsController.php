<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\color;
use App\Models\size;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.products.product')->with([
            'products' => Product::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $colors = color::all();
        $sizes = size::all();
        return view('admin.products.create',compact('categories','colors','sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Product::$rules);
        $imageUrl = $request->file('image')->store('products', ['disk' => 'public']);
        $product = new Product;
        $product->fill($request->post());
        $product['is_featured']= $request->input('is_featured') ? 1 : 0;
        $product['is_recent']= $request->input('is_recent') ? 1 : 0;
        $product['image'] = $imageUrl;
        $product->save();
        return redirect()->action([ProductsController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $colors = color::all();
        $sizes = size::all();
        return view('admin.products.edit', compact('product','categories','colors','sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $image = $request->file('image');
        if($image !='' ){
        $request->validate(Product::$rules);
        $imageUrl = $request-> file('image')->store('products', ['disk' => 'public']);
        $product->fill($request->post());
        $product['image'] = $imageUrl;
        $product->save();
        return redirect()->action([ProductsController::class, 'index']);
        }
        else{
        $request->validate(Category::$ruleswithoutfiles);
        $product->fill($request->post());
        $product->save();
        return redirect()->action([ProductsController::class, 'index']);     
        }        
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Product::destroy($id);
        return redirect("index")->with('success', 'Record has been deleted successfully!');
  
    }
}
