<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;

class ItemComponent extends Component
{
    public $item_id;
    public function mount($item_id)
    {
        $this->item_id = $item_id;
    }
    public function render()
    {
        $item = Item::find($this->item_id);
        return view('livewire.item-component', compact('item'));
    }
}
