<?php

namespace App\Http\Livewire;

use stdClass;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

function wishlistSearch($user_id){
    $data = DB::table('wishlist')->where('user_id', $user_id)->get();
    $list = [];
    foreach($data as $info){
        $item = Item::find($info->item_id);
        array_push($list, $item);
    }
    return collect($list);
}

function toCollection($data){
    return collect(json_decode(json_encode($data)));
}

class WishlistComponent extends Component
{
    use WithPagination;
    public $user_id;
    public $pageSize;
    public $wishlist;
    public function mount($user_id){
        $this->pageSize = 12;
        $this->user_id = $user_id;
        $this->wishlist = wishlistSearch($user_id);
    }
    public function changePageSize($size){
        $this->pageSize = $size;
    }
    public function removeWishlist($id){
        DB::table('wishlist')->where('user_id', $this->user_id)->where('item_id', $id)->delete();
        $this->wishlist = wishlistSearch($this->user_id);
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
    }
    public function render()
    {
        $object = toCollection($this->wishlist);
        $currentPage = Paginator::resolveCurrentPage();
        $currentPageItems = $object->slice(($currentPage - 1) * $this->pageSize, $this->pageSize)->all();
        $items = new Paginator($currentPageItems, count($object), $this->pageSize);
        return view('livewire.wishlist-component', compact('items'));
    }
}