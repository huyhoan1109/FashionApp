<?php

namespace App\Http\Livewire\Admin;

use App\Models\Item;
use Carbon\Carbon;
use Livewire\Component;

class AdminEditProductComponent extends Component
{
    public $product_id;
    public $name;
    public $quantity;
    public $type;
    public $for_male;
    public $price;
    public $discount_price;
    public $image;
    public $description;
    public $review;
    public $rate;
    public $created_at;
    public $update_at;
    public $newimage;
    public function mount($product_id)
    {
        $item= Item::find($product_id);
        $this->product_id=$item->id;
        $this->name = $item->name;
        $this->quantity = $item->quantity;
        $this->type = $item->type;
        $this->for_male = $item->for_male;
        $this->price = $item->price;
        $this->discount_price = $item->discount_price;
        $this->image = $item->image;
        $this->description = $item->description;
        $this->rate = $item->rate;
        $this->created_at = $item->created_at;

    }
    public function update()
    {   
        
        $item =Item::find($this->product_id);
        $item->name = $this->name;
        $item->quantity = $this->quantity;
        $item->type = $this->type;
        $item->for_male = $this->for_male;
        $item->price = $this->price;
        $item->discount_price = $this->discount_price;
        $item->image = $this->image;
        $item->description = $this->description;
        $item->rate = $this->rate;
        $item->created_at = $this->created_at;
        $item->update_at=Carbon::today();
        $item->save();
        session()->flash('message','New product has been update sucessfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-product-component');
    }
}
