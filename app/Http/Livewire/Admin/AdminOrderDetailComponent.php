<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Item;

class AdminOrderDetailComponent extends Component
{
    public $order_id;
    public function mount($order_id)
    {
        $this->$order_id = $order_id;
        
    }
    public function render()
    {

        $order=OrderItem::where('order_id',$this->order_id)->get();
        $orderr = Order::where('id',$this->order_id)->get();

        $order1=OrderItem::where('order_id',$this->order_id)->first();
        $item1=Item::where('name',$order1->name)->get();

        $order_belong_user = Order::where('id',$this->order_id)->first();
        $user = User::where('id',$order_belong_user->user_id)->get();
        return view('livewire.admin.admin-order-detail-component',['order'=>$order,'orderr'=>$orderr,'user'=>$user,'item1'=>$item1]);
    }
}
