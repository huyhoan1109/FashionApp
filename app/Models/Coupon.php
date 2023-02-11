<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = "coupon";
    protected $fillable = [
        'coupon_code',
        'discount',
    ];
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function has_coupon()
    {
        return $this->hasMany(HasCoupon::class);
    }
}
