<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Order;
use Livewire\WithPagination;

class AdminOrderComponent extends Component
{    use WithPagination;
    public function render()
    {
        $orders = Order::orderBy('id','ASC')-> paginate(10);
        return view('livewire.admin.admin-order-component',
     [
         'orders' => $orders
     ]);
        
    }
}
