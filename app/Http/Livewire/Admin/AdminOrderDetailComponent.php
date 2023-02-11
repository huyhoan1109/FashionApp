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
        $orderItem = OrderItem::where('order_id',$this->order_id)->get();
        $order = Order::where('id',$this->order_id)->first();
        return view('livewire.admin.admin-order-detail-component',[        
            'orderItem' => $orderItem,
            'order' => $order]
        );
    }
}
