<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AdminAddCouponComponent extends Component
{
    public function submitCoupon($data)
    {   
        // $data = 
        $validator = Validator::make($data,[
            "coupon_code" => "required",
            "discount" => "required",
        ]);
        if ($validator){
            $coupon = new Coupon();
            $coupon->coupon_code = $data["coupon_code"];
            $coupon->discount = $data["discount"];
            $coupon->created_at=Carbon::today();
            $coupon->save();
            session()->flash('message','New coupon has been added sucessfully!');
        } else {
            session()->flash('message','Something is wrong!');
        }
    }
    public function render()
    {
        return view('livewire.admin.admin-add-coupon-component');
    }
}
