<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Order;
use Livewire\WithPagination;

class AdminOrderComponent extends Component
{    use WithPagination;
    public $change_order;
    public function updateOrder($order_id)
    {
        $this->change_order=$order_id;
        $order= Order::find($this->change_order);
        if($order->isApproved == '1')
        {
            $order->isApproved='0';
        }
        else
        {
            $order->isApproved='1';
        }
        $order->save();
        session()->flash('message','Order has been changed!');
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
