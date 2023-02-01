<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;

public static $rules = ['description' => 'required','rating' => 'required|numeric|min:0|max:5'];
 
protected $fillable = [
    'description',
    'rating'
]; 

public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
