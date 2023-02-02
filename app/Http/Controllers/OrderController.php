<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
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
    function makeOrder(Request $request)
    {
        $request->validate(order::$rules);
        $order = new order;
        $order['shiping_info']=json_encode($request->except('payment_method','_token'));
        $order['user_id']=Auth::user()->id;
        $order['products_id']=json_encode(Session::get('quantity', []));
        $order['payment_method']= $request->input('payment_method');
        $order['sub_total']=Session::get('sub_total', 0);
        $order['total_shipping']=Session::get('shapping', 0);
        $order['total']= Session::get('shapping', 0) + Session::get('sub_total', 0);
        $order->save();
        //clear session
        Session::put('quantity' , []);
        Session::put('ids' , []);
        Session::put('sub_total' , 0);
        Session::put('shapping' , 0);
        return redirect('checkout')->with('success', 'Record has been added successfully!');
    }


}
