<?php

namespace App\Http\Livewire;

use App\Models\Capacity;
use Livewire\Component;

use App\Models\Color;
use Gloudemans\Shoppingcart\Facades\Cart;

class UpdateCartItemCapacity extends Component
{

    public $rowId, $qty, $quantity;

    public function mount(){
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;

        $color = Color::where('name', $item->options->color)->first();
        $capacity = Capacity::where('name', $item->options->capacity)->first();

        $this->quantity = qty_available($item->id, $color->id, $capacity->id);
    }

    public function decrement(){
        $this->qty = $this->qty - 1;

        Cart::update($this->rowId, $this->qty);

        $this->emit('render');
    }

    public function increment(){
        $this->qty = $this->qty + 1;

        Cart::update($this->rowId, $this->qty);

        $this->emit('render');
    }
    
    public function render()
    {
        return view('livewire.update-cart-item-capacity');
    }
}
