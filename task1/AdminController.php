<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function admin_categories()
    {
        return view('admin.pages.category')->with([
            'categories' => Category::all()
        ]);
    }
    function admin()
    {

        return view('layout.admin');
    }

}
