<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = "item";
    protected $fillable = [
        'name',
        'quantity',
        'color',
        'for_male',
        'price',
        'discount_price',
        'size',
        'image',
        'description',
        'review'
    ];
}
