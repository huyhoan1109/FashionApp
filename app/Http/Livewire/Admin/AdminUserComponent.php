<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

use Livewire\WithPagination;

class AdminUserComponent extends Component
{
    use WithPagination;
    public $delete_user;
    public function deleteUser()
    {
        $user=User::find($this->delete_user);
        if($user->type==0)
        {
            session()->flash('message',"Cannot delete admin's account!");
        }
        else
        {
            if (isset($user))
                {
                    $user->delete();
                    session()->flash('message','User has been deleted!');
                }
        } 
        redirect()->route('admin.users');
    }

    public function getConfirm($user_id){
        $this->delete_user = $user_id;
        error_log($user_id);
    }
    public function render()
    {
        $user= User::orderBy('id','ASC')->paginate(10); 
        $totalUser= User::where('type','1')->count();

        return view('livewire.admin.admin-user-component',[
            'user'=> $user,
            'totalUser'=> $totalUser,
    ]);
    }
}
