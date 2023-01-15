<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

function allCoupon($user_id){
    return DB::table('has_coupon')
         ->where('user_id', $user_id)
        ->where('expired_at', '>', now())
        ->where('avail', true)
        ->pluck('coupon_id');
}
class CheckoutComponent extends Component
{
    protected $listeners = [
        'refreshComponent' => '$refresh'
    ];
    
    public $user;
    public $user_id;
    public $cart;
    public $availCouponId;
    public $coupon;
    public $total;
    public $price;
    public $swal_error = [
        'title' => "You haven't ordered yet",
        'timer'=>3000,
        'icon'=>'error',
        'toast'=>true,
        'position'=>'top-right',
        'showConfirmButton' => false
    ];
    public $swal_success = [
        'title' => 'You have ordered successfully',
        'timer'=>3000,
        'icon'=>'success',
        'toast'=>true,
        'position'=>'top-right',
        'showConfirmButton' => false
    ];
    public function mount(){
        $this->user_id = Session::get('key')['id'];
        $this->user = User::find($this->user_id);
        $this->cart = Cart::where('user_id', $this->user_id)->get();        
        $this->price = 0;
        foreach($this->cart as $item){
            $info = Item::find($item->item_id);
            $subtotal = $item->quantity * $info->discount_price;
            $this->price += $subtotal;
        }
        $this->availCouponId = allCoupon($this->user_id);
        $this->total = $this->price;
    }

    public function removeCoupon(){
        $this->coupon = null;
        $this->total = $this->price;
    }

    public function changeCoupon($coupon_id){
        $this->coupon = Coupon::find($coupon_id);
        $this->total = $this->price * (1-$this->coupon->discount);
    }

    public function createOrder($data){
        if($this->total > 0){
            $order = new Order();
            if($this->coupon != null){
                DB::table('has_coupon')
                ->where('user_id', $this->user->id)
                ->where('coupon_id', $this->coupon->id)
                ->update(['avail' => false]);
                $this->availCouponId = allCoupon($this->user_id);
                $order->coupon_id = $this->coupon->id;
            } else {
                $order->coupon_id = null;
            }
            $order->note =  "Customer: ".$data['firstname']." ".$data['lastname']."\n".
                            "Address: ".$data['address']."\n".
                            "Phone: ".$data['phone']."\n";
            $order->total = $this->total;
            if($data['payment_option'] == 'pay1'){
                $order->payment = 1;
            } elseif ($data['payment_option'] == 'pay2'){
                $order->payment = 2;
            } else{
                $order->payment = 3;
            } 
            $order->user_id = $this->user->id;
            if ($this->user->type == 2){
                $this->user->firstname = $data['firstname'];
                $this->user->lastname = $data['lastname'];
                $this->user->save();
            }
            $order->subtotal = $this->price;
            $order->save();
            foreach($this->cart as $item){
                $info = Item::find($item->item_id);
                DB::table('orderItem')->insert([
                    'discount_price' => $info->discount_price, 
                    'price' => $info->price,
                    'quantity' => $item->quantity,
                    'name' => $info->name,
                    'description' => $info->description,
                    'order_id' => $order->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
            Cart::where('user_id', $this->user->id)->delete();
            $this->dispatchBrowserEvent('swal', $this->swal_success);
            Mail::send('mail.order-track',['order_id' => $order->id], function($message) use ($data) {
                $message->subject('Your Order');
                $message->to($data['email']);
            });
        } else {
            $this->dispatchBrowserEvent('swal', $this->swal_error);
        }
    }
    public function render()
    {
        $user = $this->user;
        $cart = $this->cart;
        $coupon = $this->coupon;
        $price = $this->price;
        $total = $this->total;
        return view('livewire.checkout-component', compact(
            'user', 'cart', 'coupon', 'price', 'total'
        ));
    }
}