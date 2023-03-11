<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddCartItemCapacity extends Component
{

    public $product, $capacities;

    public $size_id;

    public function mount(){
        $this->capacities = $this->product->capacity;
    }

    public function render()
    {
        return view('livewire.add-cart-item-capacity');
    }
}
