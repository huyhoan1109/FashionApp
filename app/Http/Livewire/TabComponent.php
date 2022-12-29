<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TabComponent extends Component
{
    public $items;
    public function mount($items){
        $this->items = $items;
    }
    public function render()
    {
        return view('livewire.tab-component', [
            'items' => $this->items
        ]);
    }
}
