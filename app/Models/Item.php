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
        'color',
        'for_male',
        'price',
        'size',
        'image',
        'description',
        'review'
    ];
}
