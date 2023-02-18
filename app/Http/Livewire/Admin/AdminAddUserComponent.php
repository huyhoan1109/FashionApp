<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class AdminAddUserComponent extends Component
{
    // Nho dung ham has voi mat khau
    public function submitUser($data)
    {   
        $validator = Validator::make($data,[
            "firstname" => "required",
            "lastname" => "required",
            "gender" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required",
            "password" => "required"
        ]);
        if ($validator){
            $user = new User();
            $user->firstname = $data["firstname"];
            $user->lastname = $data["lastname"];
            $user->gender = $data["gender"];
            $user->phone = $data["phone"];
            $user->email = $data["email"];
            $user->address = $data["address"];
            $user->password = Hash::make($data["password"]);
            $user->type = 1;
            $user->created_at=Carbon::today();
            $user->save();
            session()->flash('message','New user has been added sucessfully!');
        } else {
            session()->flash('message','Something is wrong!');
        }
    }
    public function render()
    {
        return view('livewire.admin.admin-add-user-component');
    }
}
