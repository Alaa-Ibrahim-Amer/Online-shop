<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index()
    {
        return view('admin.orders')->with([
            'orders' => order::paginate(5)
        ]);
    }
    function destroy($id)
    {
        order::destroy($id);
        return redirect()->action([OrderController::class, 'index'])->with('success', 'Record has been deleted successfully!');
    }

}
