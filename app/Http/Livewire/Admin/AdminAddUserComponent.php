<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminAddUserComponent extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $gender='1';
    public $phone;
    public $password='0';
    public $type='1';
    public $address;
    public function updated($field)
    {
       $this->validateOnly($field,[
        'firstname'=>'required',
        'lastname'=>'required',
        'email'=>'required',
        'gender'=>'required',
        'phone'=>'required',
        'password'=>'required',
        'type'=>'required',
        'address'=>'required',
       ]);
    }
    public function addUser()
    {
        $this->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'password'=>'required',
            'type'=>'required',
            'address'=>'required',
        ]);
        $user= new User();
        $user->firstname=$this->firstname;
        $user->lastname=$this->lastname;
        $user->email=$this->email;
        $user->gender=$this->gender;
        $user->phone=$this->phone;
        $user->password=$this->password;
        $user->type=$this->type;
        $user->address=$this->address;
        $user->save();
        session()->flash('message','New user has been added sucessfully!');
       
    }
    public function render()
    {
        return view('livewire.admin.admin-add-user-component');
    }
}
