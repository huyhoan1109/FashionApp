<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;
class ShopComponent extends Component
{
    public function render()
    {
        $items = Item::all();
        return view('livewire.shop-component', compact('items'));
    }
}
