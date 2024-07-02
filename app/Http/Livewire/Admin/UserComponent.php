<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;


class UserComponent extends Component
{
    use WithPagination;

    public $search, $roles, $user, $users_list;

    public $editForm = [
        'open' => false,
        'name' => null,
        'email' => null,
        'password' => null,
        'role' => null,
    ];

    public function mount()
    {
        $this->getRoles();
        $this->getUsers();
    }

    public function refreshUser(){
        $this->user = $this->user->fresh();
    }

    public function getRoles()
    {
        $this->roles = Role::all();
    }

    public function getUsers()
    {
        $this->users_list = User::all()->where('email', '<>', auth()->user()->email);
    }


    public function updatingSearch(){
        $this->resetPage();
    }

    public function edit(User $user)
    {
        $this->resetValidation();
        $this->user = $user;

        $this->editForm['open'] = true;
        $this->editForm['name'] = $user->name;
        $this->editForm['email'] = $user->email;
        $this->editForm['password'] = $user->password;
        $this->editForm['role'] = $user->roles->pluck('id');
    }

    public function update()
    {

        $rules = [
            'editForm.name' => 'required',
            'editForm.email' => 'required',
            'editForm.password' => 'required',
            'editForm.role' => 'required',
        ];

        $this->validate($rules);

        $this->user->update($this->editForm);

        $this->user->roles()->sync($this->editForm['role']);

        $this->reset(['editForm']);

        $this->getUsers();
    }

    public function delete(User $user)
    {
        $user->delete();
        $this->getUsers();
    }

    public function assignRole(User $user, $value){

        if ($value == '1') {
            $user->assignRole('admin');
        }else{
            $user->removeRole('admin');
        }

    }

    public function render()
    {

        $users = User::where('email', '<>', auth()->user()->email)
                    ->where(function($query){
                        $query->where('name', 'LIKE', '%' . $this->search . '%');
                        $query->orWhere('email', 'LIKE', '%' . $this->search . '%');
                    })->paginate();

        return view('livewire.admin.user-component', compact('users'))->layout('layouts.admin');
    }
}
