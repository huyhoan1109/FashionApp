<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class WishlistComponent extends Component
{
    public function render()
    {
        $user_id = Session::get('key')['id'];
        $items = DB::table('wishlist')->where('user_id', $user_id)->get()->pluck('item_id');
        return view('livewire.wishlist-component', compact('items'));
    }
}
