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
    public $item_type;
    public $filter = [];
    public function getFilter($data){
        if(isset($data['price_filter'])) {
            if ($data['price_filter'] == 'price1') {$p1 = 1; $p2=30;}
            elseif ($data['price_filter'] == 'price2') {$p1 = 30; $p2=60;}
            elseif ($data['price_filter'] == 'price3') {$p1 = 60; $p2=100;}
            elseif ($data['price_filter'] == 'price4') {$p1 = 100; $p2=300;}
            $this->filter['discount_price'][0] = $p1;
            $this->filter['discount_price'][1] = $p2;
        }
        if(isset($data['rating_star'])) $this->filter['rate'] = $data['rating_star'];
        if(isset($data['for_male'])) $this->filter['for_male'] = $data['for_male'];
    }
    public function getCategory($item_type){
        if($item_type) $this->item_type = $item_type;
        else redirect()->route('shop');
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
        $this->filter['discount_price'] = null;
        $this->filter['gender'] = null;
        $this->filter['for_male'] = null;
        $this->item_type = null;
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
        $queryItem = Item::query();
        if ($this->item_type != 0){
            $queryItem = $queryItem->where('type', $this->item_type);
        }
        foreach($this->filter as $key => $value){
            if ($value != null){
                if ($key == 'discount_price'){
                    $queryItem = $queryItem->where($key, '>', $value[0])->where($key, '<', $value[1]);
                } elseif ($key == 'rate'){
                    $queryItem = $queryItem->where($key, '>=', $value[0]-0.5)->where($key, '<', $value[0]+0.5);
                }
                else {
                    $queryItem = $queryItem->where($key, $value);
                }
            }
        }
        if($name == null){
            if($this->sortBy == 'Featured'){
                $items = $queryItem->paginate($this->pageSize);
            }
            elseif($this->sortBy == 'Low to High'){
                $items = $queryItem->orderBy('discount_price', 'ASC')->paginate($this->pageSize);
            }
            elseif($this->sortBy == 'High to Low'){
                $items = $queryItem->orderBy('discount_price', 'DESC')->paginate($this->pageSize);
            }
            elseif($this->sortBy == 'Newest'){
                $items = $queryItem->orderBy('created_at', 'DESC')->paginate($this->pageSize);
            }
        } else {
            $like_items = $queryItem->where('name', 'like', '%'.$name.'%');
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