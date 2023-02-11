<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
use Livewire\WithPagination;
class AdminCouponComponent extends Component
{
    
    use WithPagination;
    
    public $delete_coupon;
    public function deleteCoupon()
    {
        $coupon=Coupon::find($this->delete_coupon);
        if (isset($coupon)){
            $coupon->delete();
            session()->flash('message','Coupon has been deleted!');
        } 
        redirect()->route('admin.coupons');
    }

    public function getConfirm($coupon_id){
        $this->delete_coupon = $coupon_id;
        error_log($coupon_id);
    }
    public function render()
    {
        $coupons= Coupon::orderBy('id','ASC')->get(); 
        return view('livewire.admin.admin-coupon-component',[
            'coupons'=> $coupons
    ]);
    }
}
