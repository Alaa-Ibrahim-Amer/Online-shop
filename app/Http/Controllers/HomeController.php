<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index()
    {
        return view('index')->with('categories',Category::all());
    }

    function shop(){
        return view('shop');
    }
}