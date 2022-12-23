<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item;
class SearchComponent extends Component
{
    public function render()
    {
        return view('livewire.search-component');
    }
}