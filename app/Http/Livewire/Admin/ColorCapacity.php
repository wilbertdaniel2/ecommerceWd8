<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use Livewire\Component;

use App\Models\ColorCapacity as Pivot;

class ColorCapacity extends Component
{

    public $capacity, $colors, $color_id, $quantity, $open = false;

    public $pivot, $pivot_color_id, $pivot_quantity;

    protected $listeners = ['delete'];

    protected $rules = [
        'color_id' => 'required',
        'quantity' => 'required|numeric'
    ];

    public function mount(){
        $this->colors = Color::all();
    }

    public function save(){
        $this->validate();

        $pivot = Pivot::where('color_id', $this->color_id)
                    ->where('capacity_id', $this->capacity->id)
                    ->first();

        if ($pivot) {
            
            $pivot->quantity = $pivot->quantity + $this->quantity;
            $pivot->save();

        } else {

            $this->capacity->colors()->attach([
                $this->color_id => [
                    'quantity' => $this->quantity
                ]
            ]);
            
        }
        

        $this->reset(['color_id', 'quantity']);

        $this->emit('saved');

        $this->capacity = $this->capacity->fresh();
    }

    public function edit(Pivot $pivot){

        $this->open = true;

        $this->pivot = $pivot;

        $this->pivot_color_id = $pivot->color_id;

        $this->pivot_quantity = $pivot->quantity;
    }

    public function update(){
        $this->pivot->color_id = $this->pivot_color_id;
        $this->pivot->quantity = $this->pivot_quantity;

        $this->pivot->save();

        $this->capacity = $this->capacity->fresh();

        $this->reset('open');
    }

    public function delete(Pivot $pivot){
        $pivot->delete();
        $this->capacity = $this->capacity->fresh();
    }

    public function render()
    {

        $capacity_colors = $this->capacity->colors;

        return view('livewire.admin.color-capacity', compact('capacity_colors'));
    }
}
