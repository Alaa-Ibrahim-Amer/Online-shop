<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\SizesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class,'index'])->name('');
Route::get('/loved_products_count', [MainController::class, 'loved_products_count']);
Route::get('/shop', [MainController::class, 'shop'])->name('shop');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/contact',[ContactController::class,'sendMessage']);
Route::get(('/admin'), [MainController::class, 'admin']);
Route::get('/details/{id}', [MainController::class, 'details']);
Route::get(('/checkout'), [MainController::class, 'checkout'])->middleware(['auth']);
Route::get('/cart', [MainController::class, 'cart'])->name('cart');
Route::get('/add-product', [CartController::class, 'add_product']);
Route::get('/update-cart', [CartController::class, 'update_cart_totals']);
Route::get('/add-product-q', [CartController::class, 'add_product_q']);
Route::get('/update-cart-q', [CartController::class, 'update_cart_totals_q']);
Route::get('/dec-total-cart', [CartController::class, 'dec_cart_totals']);
Route::get(('/inc-quantuty-in-cart'), [CartController::class, 'incQuantity']);
Route::get(('/dec-quantuty-in-cart'), [CartController::class, 'decQuantity']);
Route::get(('/delete-product-in-cart'), [CartController::class, 'deleteLine']);
Route::post('/add-review/{id}',[ReviewController::class,'add_review']);
Route::post('/newsletter',[MainController::class,'newsletter']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'can:is_admin'])->prefix('/admin')->group(function () {
    Route::resource('products', ProductsController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('colors', ColorsController::class);
    Route::resource('sizes', SizesController::class);
    Route::get('users', [UsersController::class,'index']);
    Route::put('users/{id}', [UsersController::class, 'make_admin']);
    Route::delete('users/{id}', [UsersController::class, 'destroy']);
    Route::get('orders', [OrderController::class,'index']);
    Route::delete('orders/{id}', [OrderController::class, 'destroy']);
    
});