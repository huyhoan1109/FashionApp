<?php

namespace App\Http\Livewire\Admin;

use App\Models\Item;
use Livewire\Component;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\WithPagination;

class AdminOrderComponent extends Component
{    use WithPagination;
    public $change_order;
    public function updateOrder($order_id)
    {
        $this->change_order=$order_id;
        $order= Order::find($this->change_order);
        if($order->state == '1')
        {
            $order->state='0';
        }
        if($order->state == '0')
        {
            $order->state='1';
        }
        
        $order->save();
        session()->flash('message','Order has been changed!');
        redirect()->route('admin.orders');
    }
    public function cancelOrder($order_id)
    {
        $this->change_order=$order_id;
        $order= Order::find($this->change_order);    
        $order->state='2';
        $order->save();
        $orderitems=OrderItem::where('order_id',$this->change_order)->get();
        foreach($orderitems as $item)
        {
            $product=Item::where('name',$item->name)->first();
            $product->quantity+=$item->quantity;
            $product->save();
        }
        session()->flash('message','Order has been canceled!');
        redirect()->route('admin.orders');
    }
    public function render()
    {
        $orders = Order::orderBy('id','DESC')-> paginate(10);
        return view('livewire.admin.admin-order-component',
     [
         'orders' => $orders
     ]);
        
    }
}
