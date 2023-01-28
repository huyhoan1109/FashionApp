<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;

use Livewire\WithPagination;

class AdminDashboardComponent extends Component
{    use WithPagination;
    public function render()
    {   
        $todayshowOrder = Order::whereDate('created_at',Carbon::today())->paginate(5);
        $totalUser= User::where ('type','1')->count();
        $todayOrder = Order::whereDate('created_at',Carbon::today())->count();
        $todayRevenue = Order:: whereDate('created_at',Carbon::today())->sum('total');
        $totalRevenue = Order::where('isApproved','1')->sum('total');
        return view('livewire.admin.admin-dashboard-component',[
            'totalUser' => $totalUser,
            'todayOrder'=> $todayOrder,
            'todayRevenue' => $todayRevenue,
            'totalRevenue' => $totalRevenue,
            'todayshowOrder'=>$todayshowOrder,
        ]);
    }
}
