<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasCoupon extends Model
{
    use HasFactory;
    protected $table = "has_coupon";
  
    public function coupon()
    {
        return $this->belongsTo(Coupon::class,'coupon_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
