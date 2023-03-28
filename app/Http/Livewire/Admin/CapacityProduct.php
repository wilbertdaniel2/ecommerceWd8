<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Capacity;

class CapacityProduct extends Component
{

    public $product, $name, $open = false;

    public $name_edit;

    protected $rules = [
        'name' => 'required'
    ];

    public function save(){
        $this->validate();

        $this->product->capacities()->create([
            'name' => $this->name
        ]);

        $this->product = $this->product->fresh();
    }

    public function edit(Capacity $capacity){
        $this->open = true;

        $this->name_edit = $capacity->name;
    }

    public function render()
    {
        $capacities = $this->product->capacities;

        return view('livewire.admin.capacity-product', compact('capacities'));
    }
}
