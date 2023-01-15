<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Cart;

use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class ShopComponent extends Component
{
    protected $listeners = ['refreshComponent', '$refresh'];
    use WithPagination;
    public $pageSize;
    public $sortBy;
    public $item_name;
    public $user_id;
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
    public function addWishlist($item_id){
        $validator = DB::table('wishlist')
                    ->where('user_id', $this->user_id)
                    ->where('item_id', $item_id)
                    ->exists();
        if(!$validator){
            DB::table('wishlist')->insert([
                'user_id' => $this->user_id,
                'item_id' => $item_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
    }
    public function removeWishlist($item_id){
        DB::table('wishlist')
            ->where('user_id', $this->user_id)
            ->where('item_id', $item_id)
            ->delete();
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
    }
    public function mount($item_name){
        $this->pageSize = 12;
        $this->sortBy = 'Featured';
        $this->item_name = $item_name;
        $this->user_id = Session::get('key')['id'];
    }
    public function changePageSize($size){
        $this->pageSize = $size;
    }
    public function changeSort($sort){
        $this->sortBy = $sort;
    }
    public function render()
    {
        $name = $this->item_name;
        if($name == null){
            if($this->sortBy == 'Featured'){
                $items = Item::paginate($this->pageSize);
            }
            elseif($this->sortBy == 'Low to High'){
                $items = Item::orderBy('discount_price', 'ASC')->paginate($this->pageSize);
            }
            elseif($this->sortBy == 'High to Low'){
                $items = Item::orderBy('discount_price', 'DESC')->paginate($this->pageSize);
            }
            elseif($this->sortBy == 'Newest'){
                $items = Item::orderBy('created_at', 'DESC')->paginate($this->pageSize);
            }
        } else {
            $like_items = Item::where('name', 'like', '%'.$name.'%');
            if($this->sortBy == 'Featured'){
                $items = $like_items->paginate($this->pageSize);
            }
            elseif($this->sortBy == 'Low to High'){
                $items = $like_items->orderBy('discount_price', 'ASC')->paginate($this->pageSize);
            }
            elseif($this->sortBy == 'High to Low'){
                $items = $like_items->orderBy('discount_price', 'DESC')->paginate($this->pageSize);
            }
            elseif($this->sortBy == 'Newest'){
                $items = $like_items->orderBy('created_at', 'DESC')->paginate($this->pageSize);
            }
        }
        return view('livewire.shop-component', [
            'items' => $items
        ]);
    }
}