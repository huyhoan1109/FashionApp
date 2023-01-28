<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
class AdminUserComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $user = User::orderBy('id','ASC')->paginate(5);
        return view('livewire.admin.admin-user-component',['user'=>$user]);
    }
}
