<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
class AdminEditProductComponent extends Component
{
    public $product_id;
    public function mount($product_id)
    {
        $this->product_id= $product_id; 
    }
    public function submitItem($data)
    {       
        $item= Item::find($this->product_id);
            if (($data["name"])!='')
            {
                $item->name = $data["name"];
            }
            if (($data["type"])!='')
            {
                $item->type = $data["type"];
            }
            if (($data["price"])!='')
            {
                $item->price = $data["price"];
            }
            if (($data["discount_price"])!='')
            {
                $item->discount_price = $data["discount_price"];
            }
            if (($data["quantity"])!='')
            {
                $item->quantity = $data["quantity"];
            }
            if (($data["description"])!='')
            {
                $item->description = $data["description"];
            }
            if (($data["image"])!='')
            {
                $item->image = $data["image"];
            }
            $item->rate = 0;
            $item->review = 0;
            $item->updated_at=Carbon::today();
            $item->save();
            session()->flash('message','New product has been updated sucessfully!');
    }
    public function render()
    {
        $product= Item::where('id',$this->product_id)->first();
        return view('livewire.admin.admin-edit-product-component',[
            'product' => $product,
        ]);
    }
}
