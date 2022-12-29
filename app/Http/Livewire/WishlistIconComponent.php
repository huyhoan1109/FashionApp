<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class WishlistIconComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
        $user_id = Session::get('key')['id'];
        $items = DB::table('wishlist')->where('user_id', $user_id)->get();
        return view('livewire.wishlist-icon-component', compact('items'));
    }
}
