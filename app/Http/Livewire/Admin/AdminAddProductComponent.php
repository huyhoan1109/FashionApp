<?php

namespace App\Http\Livewire\Admin;

use App\Models\Item;
use Livewire\Component;

class AdminAddProductComponent extends Component
{   
    public $name;
    public $quantity='0';
    public $type='1';
    public $for_male='1';
    public $price='0';
    public $discount_price='0';
    public $image;
    public $description;
    public $review;
    public $rate;
    public $created_at;
    public function updated($field)
    {
       $this->validateOnly($field,[
        'name'=>'required',
        'quantity'=>'required',
        'type'=>'required',
        'for_male'=>'required',
        'price'=>'required',
        'discount_price'=>'required',
       ]);
    }
    public function submit()
    {   
        $this->validate(
            [
                'name'=>'required',
                'quantity'=>'required',
                'type'=>'required',
                'for_male'=>'required',
                'price'=>'required',
                'discount_price'=>'required',
            ]
            );
        $item = new Item();
        $item->name = $this->name;
        $item->quantity = $this->quantity;
        $item->type = $this->type;
        $item->for_male = $this->for_male;
        $item->price = $this->price;
        $item->discount_price = $this->discount_price;
        $item->save();
        session()->flash('message','New product has been added sucessfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-product-component');
    }
}
