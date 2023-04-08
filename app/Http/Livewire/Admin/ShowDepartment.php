<?php

namespace App\Http\Livewire\Admin;

use App\Models\Municipality;
use App\Models\Department;
use Livewire\Component;

class ShowDepartment extends Component
{
    protected $listeners = ['delete'];

    public $department, $municipalities, $municipality;

    public $createForm = [
        'name' => '',
        'cost' => null
    ];

    public $editForm = [
        'open' => false,
        'name' => '',
        'cost' => null
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.cost' => 'costo'
    ];


    public function mount(Department $department){
        $this->department = $department;
        $this->getMunicipalities();
    }

    public function getMunicipalities(){
        $this->municipalities = Municipality::where('department_id', $this->department->id)->get();
    }

    public function save(){

        $this->validate([
            "createForm.name" => 'required',
            "createForm.cost" => 'required|numeric|min:1000|max:50000',
        ]);

        $this->department->municipalities()->create($this->createForm);


        $this->reset('createForm');

        $this->getMunicipalities();

        $this->emit('saved');
    }

    public function edit(Municipality $municipality){
        $this->municipality = $municipality;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $municipality->name;
        $this->editForm['cost'] = $municipality->cost;
    }

    public function update(){
        $this->municipality->name = $this->editForm['name'];
        $this->municipality->cost = $this->editForm['cost'];
        $this->municipality->save();

        $this->reset('editForm');
        $this->getMunicipalities();
    }


    public function delete(Municipality $municipality){
        $municipality->delete();
        $this->getMunicipalities();
    }


    public function render()
    {
        return view('livewire.admin.show-department')->layout('layouts.admin');
    }
}
