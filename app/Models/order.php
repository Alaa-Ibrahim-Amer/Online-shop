<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $cast=['product_ids'=>'array'];
    public static $rules = ['payment_method' => 'required'];
    protected $fillable = ['user_id','products_id','shiping_info','payment_method','sub_total','total_shipping','total'
    ]; 
}
