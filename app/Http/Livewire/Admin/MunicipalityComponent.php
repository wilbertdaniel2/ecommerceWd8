<?php

namespace App\Http\Livewire\Admin;


use App\Models\Municipality;
use App\Models\Neighborhood;
use Livewire\Component;

class MunicipalityComponent extends Component
{

    protected $listeners = ['delete'];

    public $municipality, $neighborhoods, $neighborhood;

    public $createForm = [
        'name' => '',
    ];

    public $editForm = [
        'open' => false,
        'name' => '',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
    ];

    public function mount(Municipality $municipality){
        $this->municipality = $municipality;
        $this->getNeighborhoods();
    }

    public function getNeighborhoods(){
        $this->neighborhoods = Neighborhood::where('municipality_id', $this->municipality->id)->orderBy('name')->get();
    }

    public function save(){

        $this->validate([
            "createForm.name" => 'required',
        ]);

        $this->municipality->neighborhoods()->create($this->createForm);

        $this->reset('createForm');

        $this->getNeighborhoods();

        $this->emit('saved');
    }

    public function edit(Neighborhood $neighborhood){
        $this->neighborhood = $neighborhood;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $neighborhood->name;
    }

    public function update(){
        $this->neighborhood->name = $this->editForm['name'];
        $this->neighborhood->save();

        $this->reset('editForm');
        $this->getNeighborhoods();
    }

    public function delete(Neighborhood $neighborhood){
        $neighborhood->delete();
        $this->getNeighborhoods();
    }


    public function render()
    {
        return view('livewire.admin.municipality-component')->layout('layouts.admin');
    }
}
