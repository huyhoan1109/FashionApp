<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Cart;

use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

function wishlistSearch($user_id, $sort){
    $data = DB::table('wishlist')->where('user_id', $user_id)->get();
    $list = [];
    foreach($data as $info){
        $item = Item::find($info->item_id);
        array_push($list, $item);
    }
    $reval = collect($list);
    if ($sort == 'Featured'){
        $sorted = $reval;
    }
    elseif($sort == 'Low to High'){
        $sorted = $reval->sortBy('discount_price');
    }
    elseif($sort == 'High to Low'){
        $sorted = $reval->sortByDesc('discount_price');
    }
    elseif($sort == 'Newest'){
        $sorted = $reval->sortBy('created_at');
    }
    return $sorted;
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
    public $sortBy;
    public function mount(){
        $this->pageSize = 12;
        $this->user_id = Session::get('key')['id'];
        $this->sortBy = 'Featured';
        $this->wishlist = wishlistSearch($this->user_id, $this->sortBy);
    }
    public function changePageSize($size){
        $this->pageSize = $size;
    }
    public function changeSort($sort){
        $this->sortBy = $sort;
        $this->wishlist = wishlistSearch($this->user_id, $sort);
    }
    public function removeWishlist($id){
        DB::table('wishlist')->where('user_id', $this->user_id)->where('item_id', $id)->delete();
        $this->wishlist = wishlistSearch($this->user_id, $this->sortBy);
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
    }
    public function addToCart($item_id){
        $valid = Cart::where('user_id', $this->user_id)
                    ->where('item_id', $item_id)
                    ->exists();
        if(!$valid){
            Cart::create([
                'user_id' => $this->user_id,
                'item_id' => $item_id,
                'quantity' => 1
            ]);
        } else {
            $cart = Cart::where('user_id', $this->user_id)
                    ->where('item_id', $item_id)
                    ->first();
            $cart->quantity += 1;
            $cart->save();
        }
        $this->emitTo('cart-icon-component', 'refreshComponent');
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