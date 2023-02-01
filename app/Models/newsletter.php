<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsletter extends Model
{
    use HasFactory;

    public static $rules = ['email' => 'required|unique:newsletters,email'];
    protected $fillable = [
        'email'
    ]; 


}
