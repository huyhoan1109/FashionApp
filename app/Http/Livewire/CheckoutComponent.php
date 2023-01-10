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
class CheckoutComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    public $user;
    public $cart;
    public $coupon;
    public $total;
    public $price;
    public function mount($user_id){
        $this->user = User::find($user_id);
        $this->cart = Cart::where('user_id', $user_id)->get();        
        $this->coupon = Coupon::first();
        $this->price = 0;
        foreach($this->cart as $item){
            $info = Item::find($item->item_id);
            $subtotal = $item->quantity * $info->discount_price;
            $this->price += $subtotal;
        }
        $this->total = $this->user->type != 2 ? $this->price * (1-$this->coupon->discount) : $this->price;
    }
    public function createOrder($data){
        if($this->total > 0){
            $order = new Order();
            $order->note =  "Customer: ".$data['firstname']." ".$data['lastname']."\n".
                            "Address: ".$data['billing_address']."\n".
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
            if ($this->coupon != null){ 
                $order->coupon_id = $this->coupon->id;
            } else {
                $order->coupon_id = null;
            }
            if ($this->user->type == 2){
                $this->user->firstname = $data['firstname'];
                $this->user->lastname = $data['lastname'];
                $this->user->save();
            }
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
        }
        return redirect()->route('home');
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