<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Item;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{   
    use WithPagination;
    public $delete_item;
    public function deleteProduct()
    {
        $item=Item::find($this->delete_item);
        if (isset($item)){
            $item->delete();
            session()->flash('message','Product has been deleted!');
        } 
        redirect()->route('admin.products');
    }

    public function getConfirm($item_id){
        $this->delete_item = $item_id;
        error_log($item_id);
    }
    public function render()
    {
        $product = Item::orderBy('id','ASC')->paginate(10); 
        $totalProduct= Item::count();

        return view('livewire.admin.admin-product-component',[
            'product'=> $product,
            'totalProduct'=> $totalProduct,
    ]);
    }
}
