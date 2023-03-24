<?php

namespace App\Http\Livewire;

use App\Models\Capacity;
use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItemCapacity extends Component
{

    public $product, $capacities;
    public $color_id = "";
    public $qty = 1;
    public $quantity = 0;
    public $capacity_id = "";
  
    public $colors = [];

    public $options = [];

    public function mount(){
        $this->capacities = $this->product->capacity;
        $this->options['image'] = Storage::url($this->product->images->first()->url);
    }
    
    public function updatedCapacityId($value){
        $capacity = Capacity::find($value);
        $this->colors = $capacity->colors;
        $this->options['capacity'] = $capacity->name;
        $this->options['capacity_id'] = $capacity->id;
    }

    public function updatedColorId($value){
        $capacity = Capacity::find($this->capacity_id);
        $color = $capacity->colors->find($value);
        $this->quantity = qty_available($this->product->id, $color->id, $capacity->id);
        $this->options['color'] = $color->name;
        $this->options['color_id'] = $color->id;
    }

    public function decrement(){
        $this->qty = $this->qty - 1;
    }

    public function increment(){
        $this->qty = $this->qty + 1;
    }

    public function addItem(){
        Cart::add(['id' => $this->product->id,
        'name' => $this->product->name, 
        'qty' => $this->qty, 
        'price' => $this->product->price,
        'weight' => 550,
        'options' => $this->options
    ]);

    $this->quantity = qty_available($this->product->id, $this->color_id, $this->capacity_id);

    $this->reset('qty');

    $this->emitTo('dropdown-cart', 'render');
    }
    
  

    public function render()
    {
        return view('livewire.add-cart-item-capacity');
    }
}
