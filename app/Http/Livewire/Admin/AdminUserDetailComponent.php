<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\HasCoupon;
use App\Models\Coupon;
use App\Models\User;
class AdminUserDetailComponent extends Component
{
    public $user_id;
    public $delete_coupon;
    public function mount($user_id)
    {
        $this->user_id = $user_id;       
    }
    public function addCoupon($coupon_id)
    {
        error_log(($coupon_id));
        $hasCoupon = new HasCoupon();
        $hasCoupon->user_id = $this->user_id;
        $hasCoupon->coupon_id = $coupon_id;
        $hasCoupon->avail = true;
        $hasCoupon->expired_at = now()->addDays(7);
        $hasCoupon->save();
    }
    public function deleteCoupon()
    {
        $coupon_user=HasCoupon::find($this->delete_coupon);
        if (isset($coupon_user)){
            $coupon_user->delete();
            session()->flash('message',' User coupon has been deleted! ');
        } 
        redirect()->route('admin.user.detail', [
            'user_id' => $this->user_id
        ]);
    }

    public function getConfirm($coupon_id){
        error_log($coupon_id);
        $this->delete_coupon = $coupon_id;
    }
    public function render()
    {
        $couponList = Coupon::all();
        $orders = Order::where('user_id',$this->user_id);
        $sum = Order::where('user_id',$this->user_id)->sum('total');
        $user = User::find($this->user_id);
        return view('livewire.admin.admin-user-detail-component',[
            'user'=> $user,
            'orders'=> $orders,
            'sum'=>$sum,
            'couponList'=>$couponList,
        ]);
    }
}
