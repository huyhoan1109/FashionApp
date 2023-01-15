<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FilterComponent extends Component
{
    public function getFillter($data){
        error_log($data['price']);
        error_log(json_encode($data));
    }
    public function render()
    {
        return view('livewire.filter-component');
    }
}
