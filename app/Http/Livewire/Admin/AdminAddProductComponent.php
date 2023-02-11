<?php

namespace App\Http\Livewire\Admin;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class AdminAddProductComponent extends Component
{   
    public function submitItem($data)
    {   
        // $data = 
        $validator = Validator::make($data,[
            "type" => "required",
            "product_name" => "required",
            "quantity" => "required",
            "for_male" => "required",
            // "description" => "required",
            "price" => "required",
            "discount_price" => "required"
        ]);
        if ($validator){
            $item = new Item();
            $item->type = $data["type"];
            $item->price = $data["price"];
            $item->name = $data["product_name"];
            $item->quantity = $data["quantity"];
            $item->for_male = $data["for_male"];
            $item->description = $data["description"];
            $item->discount_price = $data["discount_price"];
            if (isset($data["image"])){
                $item->image = $data["image"];
            } else {
                $item->image = "";
            }
            $item->rate = 0;
            $item->review = 0;
            $item->created_at=Carbon::today();
            $item->save();
            session()->flash('message','New product has been added sucessfully!');
        } else {
            session()->flash('message','Something is wrong!');
        }
    }
    public function render()
    {
        error_log("ALL");
        return view('livewire.admin.admin-add-product-component');
    }
}
