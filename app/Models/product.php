<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'title',
        'Description',
        'image',
        'Category',
        'Quality',
        'price',
        'Discount_price',
    ];
}
