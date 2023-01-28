<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Item;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{   
    use WithPagination;
    public $product_id;
    public function deleteProduct()
    {
        $item=Item::find($this->product_id);
        $item->delete();
        session()->flash('message','Product has been deleted!');
    }
    public function render()
    {
        $product = Item::orderBy('id','ASC')->paginate(5); 
        return view('livewire.admin.admin-product-component',['product'=> $product]);
    }
}
