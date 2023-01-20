<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    function show_categories()
    {
        return view('admin.category')->with([
            'categories' => Category::all()
        ]);
    }
   
}
