<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public static $rules = ['name' => 'required', 'image' => 'required|mimes:jpg,png,bmp,jpeg|max:2048',
                            'price' => 'required', 'description' => 'required', 
                            'bar_code' => 'required', 'category_id' => 'required', 
                            'size_id' => 'required', 'color_id' => 'required','discount'=>'required'];
    protected $guarded = ['rating', 'rating_count'];
    public static $ruleswithoutfiles = [
        'price' => 'required', 'description' => 'required', 
        'bar_code' => 'required', 'category_id' => 'required', 
        'size_id' => 'required', 'color_id' => 'required',
        'name' => 'required','discount'=>'required'
    ];

    public function getPrice()
    {
        return $this->price - $this->price * $this->discount;
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function color()
    {
        return $this->belongsTo(color::class);
    }
    public function size()
    {
        return $this->belongsTo(size::class);
    }
}