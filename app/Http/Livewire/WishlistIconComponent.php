<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class WishlistIconComponent extends Component
{
    public $user_id;
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function mount($user_id){
        $this->user_id = $user_id;
    }
    public function render()
    {   
        $items = DB::table('wishlist')->where('user_id', $this->user_id)->get();
        return view('livewire.wishlist-icon-component', compact('items'));
    }
}