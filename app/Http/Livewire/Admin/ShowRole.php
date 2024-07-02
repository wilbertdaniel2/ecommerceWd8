<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ShowRole extends Component
{

    protected $listeners = ['delete'];

    public $role, $permissions_check = [], $permission, $permissions_list;

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
        $this->permissions_check = $this->role->permissions->pluck('id')->toArray();
    }

    public function getPermissions(){
        $this->permissions_list = Permission::all();
    }

    public function save(){
        $this->role->syncPermissions($this->permissions_check); 
    }

    

    public function render()
    {
        
        return view('livewire.admin.show-role')->layout('layouts.admin');
    }
}
