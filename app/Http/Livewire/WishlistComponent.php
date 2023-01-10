<?php

namespace App\Http\Livewire;

use Error;
use Livewire\Component;

use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\WithPagination;

class WishlistComponent extends Component
{
    use WithPagination;
    public $pageSize;
    public function mount(){
        $this->pageSize = 12;
    }
    public function changePageSize($size){
        $this->pageSize = $size;
    }
    public function render()
    {
        $user_id = Session::get('key')['id'];
        $items = DB::table('wishlist')->where('user_id', $user_id)->get();
        return view('livewire.wishlist-component', compact('items'));
    }
}
