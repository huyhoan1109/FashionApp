<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "order";
    protected $fillable = [
        "price",
        "quantity",
        "name",
        "description",
        "order_id",
        "payment"
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function coupon()
    {
        return $this->belongsTo(Coupon::class,'coupon_id','id');
    }
    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
}
