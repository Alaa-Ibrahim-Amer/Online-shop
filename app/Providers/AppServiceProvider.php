<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\View\Components\product_card;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        paginator::useBootstrap();
        $categories = Category::all();
        View::share('categories', $categories);
   
    }
}
