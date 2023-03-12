<?php

namespace App\Http\Livewire;

use App\Models\Capacity;
use Livewire\Component;

class AddCartItemCapacity extends Component
{

    public $product, $capacities;
    public $color_id = "";
    public $qty = 1;
    public $quantity = 0;
    public $capacity_id = "";

    public $colors = [];

    public function decrement(){
        $this->qty = $this->qty - 1;
    }

    public function increment(){
        $this->qty = $this->qty + 1;
    }
    
    public function updatedCapacityId($value){
        $capacity = Capacity::find($value);
        $this->colors = $capacity->colors;
    }

    public function updatedColorId($value){
        $capacity = Capacity::find($this->capacity_id);
        $this->quantity = $capacity->colors->find($value)->pivot->quantity;
    }

    public function mount(){
        $this->capacities = $this->product->capacity;
    }

    public function render()
    {
        return view('livewire.add-cart-item-capacity');
    }
}
