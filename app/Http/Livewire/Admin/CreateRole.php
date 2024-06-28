<?php

namespace App\Http\Livewire\Admin;

use Spatie\Permission\Models\Role;
use Livewire\Component;

class CreateRole extends Component
{

    public $roles, $role;

    protected $listeners = ['delete'];

    public $createForm=[
        'name' => null
    ];

    public $editForm=[
        'open' => false,
        'name' => null
    ];

    public $rules = [
        'createForm.name' => 'required'
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'editForm.name' => 'nombre'
    ];

    public function mount(){
        $this->getRoles();
    }

    public function getRoles(){
        $this->roles = Role::all();
    }
    

    public function save(){
        $this->validate();

        Role::create($this->createForm);

        $this->reset('createForm');

        $this->getRoles();
    }

    public function edit(Role $role){
        $this->role = $role;

        $this->editForm['open'] = true;
        $this->editForm['name'] = $role->name;
    }

    public function update(){
        $this->validate([
            'editForm.name' => 'required'
        ]);

        $this->role->update($this->editForm);
        $this->reset('editForm');

        $this->getRoles();
    }

    public function delete(Role $role){
        $role->delete();
        $this->getRoles();
    }


    public function render()
    {
        return view('livewire.admin.create-role');
    }
}
