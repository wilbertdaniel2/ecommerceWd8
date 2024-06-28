<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ShowRole extends Component
{

    protected $listeners = ['delete'];

    public $role, $permissions, $permission;

    // public $createForm = [
    //     'name' => '',
    //     'cost' => null
    // ];

    // public $editForm = [
    //     'open' => false,
    //     'name' => '',
    //     'cost' => null
    // ];

    // protected $validationAttributes = [
    //     'createForm.name' => 'nombre',
    //     'createForm.cost' => 'costo'
    // ];


    public function mount(Role $role){
        $this->role = $role;
        $this->getPermissions();
    }

    public function getPermissions(){
        $this->permissions = Permission::all();
    }

    public function render()
    {
        return view('livewire.admin.show-role')->layout('layouts.admin');
    }
}
