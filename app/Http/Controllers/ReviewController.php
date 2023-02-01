<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\ProductsController;
use App\Models\review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class ReviewController extends Controller
{
    function add_review(Request $request ,$id)
    {
        $request->validate(review::$rules);
        $review = new review;
        $review->fill($request->post());
        $review['product_id'] = $id;
        $review['user_id']= Auth::user()->id ;
        $review->save();
        if($request->validate(review::$rules)){
            ProductsController::update_rate($id,$review['rating']);
        }
        return redirect()->action([MainController::class, 'details'],$id);
    }


    
}
