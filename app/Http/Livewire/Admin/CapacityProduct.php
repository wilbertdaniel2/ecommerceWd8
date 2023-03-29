<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Capacity;

class CapacityProduct extends Component
{

    public $product, $name, $open = false;

    public $capacity, $name_edit;

    protected $listeners = ['delete'];

    protected $rules = [
        'name' => 'required'
    ];

    public function save(){
        $this->validate();

        $this->product->capacities()->create([
            'name' => $this->name
        ]);

        $this->reset('name');

        $this->product = $this->product->fresh();
    }

    public function edit(Capacity $capacity){
        $this->open = true;
        $this->capacity = $capacity;

        $this->name_edit = $capacity->name;
    }

    public function update(){
        $this->validate([
            'name_edit' => 'required'
        ]);

        $this->capacity->name = $this->name_edit;
        $this->capacity->save();

        $this->product = $this->product->fresh();
        $this->open = false;
    }

    public function delete(Capacity $capacity){
        $capacity->delete();
        $this->product = $this->product->fresh();
    }

    public function render()
    {
        $capacities = $this->product->capacities;

        return view('livewire.admin.capacity-product', compact('capacities'));
    }
}
