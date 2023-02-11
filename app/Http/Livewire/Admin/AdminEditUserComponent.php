<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
class AdminEditUserComponent extends Component
{
    public $user_id;
    public function mount($user_id)
    {
        $this->user_id= $user_id;
    }
    public function submitUser($data)
    {
        $user= User::find($this->user_id);
        if (($data["firstname"])!='')
            {
                $user->firstname = $data["firstname"];
            }
        if (($data["lastname"])!='')
            {
                $user->lastname = $data["lastname"];
            }
        if (($data["gender"])!='')
            {
                $user->gender = $data["gender"];
            }
        if (($data["phone"])!='')
            {
                $user->phone = $data["phone"];
            }
        if (($data["email"])!='')
            {
                $user->email = $data["email"];
            }
        if (($data["address"])!='')
            {
                $user->address = $data["address"];
            }
        if (($data["password"])!='')
            {
                $user->password = $data["password"];
            }
            $user->updated_at=Carbon::today();
            $user->save();
            session()->flash('message','User has been updated sucessfully!');
    }
    public function render()
    {   
        $user= User::where('id',$this->user_id)->first();
        return view('livewire.admin.admin-edit-user-component',[
            'user' => $user,
        ]);
    }
}
