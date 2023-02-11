<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Item;
use Livewire\WithPagination;

class AdminCategoriesComponent extends Component
{
    use WithPagination;
    public $category_id;
    public function mount($category_id)
    {
        $this->$category_id = $category_id;
    }
    public function render()
    {
        $product = Item::where('type',$this->category_id)->paginate(10); 
        return view('livewire.admin.admin-categories-component',[
            'product'=> $product,
            
    ]);
    }

}
