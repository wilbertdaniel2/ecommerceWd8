<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cover;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateCover extends Component
{

    use WithFileUploads;

    public $covers, $cover, $rand;

    protected $listeners = ['delete'];

    public $createForm = [
        'image_path' => null,
        'title' => null,
        'start_at' => null,
        'end_at' => null,
        'is_active' => true,
    ];

    public $editForm = [
        'image_path' => false,
        'title' => null,
        'start_at' => null,
        'end_at' => null,
        'is_active' => true
    ];

    public $editImage;

    protected $rules = [
        'createForm.image_path' => 'required|image|max:1024',
        'createForm.title' => 'required',
        'createForm.start_at' => 'required|unique:categories,slug',
        'createForm.end_at' => 'required',
        'createForm.is_active' => 'required'
    ];

    protected $validationAttributes = [
        'createForm.image_path' => 'imagen',
        'createForm.title' => 'titulo',
        'createForm.start_at' => 'inicio',
        'createForm.end_at' => 'final',
        'createForm.is_active' => 'estado',
        'editForm.image_path' => 'imagen',
        'createForm.title' => 'titulo',
        'editForm.start_at' => 'nombre',
        'editForm.end_at' => 'slug',
        'createForm.is_active' => 'estado'
    ];

    public function mount()
    {
        $this->getCovers();
        //$this->getCategories();
        $this->rand = rand();
    }

    // public function updatedCreateFormName($value)
    // {
    //     $this->createForm['slug'] = Str::slug($value);
    // }

    // public function updatedEditFormName($value)
    // {
    //     $this->editForm['slug'] = Str::slug($value);
    // }

    // public function getBrands()
    // {
    //     $this->brands = Brand::all();
    // }

    public function getCovers()
    {
        $this->covers = Cover::all();
    }

    public function save()
    {
        $this->validate();


        $image = $this->createForm['image_path']->store('covers');

        Cover::create([
            'image_path' => $image,
            'title' => $this->createForm['title'],
            'start_at' => $this->createForm['start_at'],
            'end_at' => $this->createForm['end_at'],
            'is_active' => $this->createForm['is_active']
        ]);

        //$category->brands()->attach($this->createForm['brands']);

        $this->rand = rand();

        $this->reset('createForm');

        $this->getcovers();

        $this->emit('saved');
    }

    public function edit(Cover $cover)
    {

        $this->reset(['editImage']);
        $this->resetValidation();
        $this->cover = $cover;

        $this->editForm['open'] = true;
        $this->editForm['name'] = $category->name;
        $this->editForm['slug'] = $category->slug;
        $this->editForm['icon'] = $category->icon;
        $this->editForm['image'] = $category->image;
        $this->editForm['brands'] = $category->brands->pluck('id');
    }

    public function update()
    {

        $rules = [
            'editForm.name' => 'required',
            'editForm.slug' => 'required|unique:categories,slug,' . $this->category->id,
            'editForm.icon' => 'required',
            'editForm.brands' => 'required',
        ];

        if ($this->editImage) {
            $rules['editImage'] = 'required|image|max:1024';
        }

        $this->validate($rules);

        if ($this->editImage) {
            Storage::delete($this->editForm['image']);
            $this->editForm['image'] = $this->editImage->store('categories');
        }

        $this->category->update($this->editForm);

        $this->category->brands()->sync($this->editForm['brands']);

        $this->reset(['editForm', 'editImage']);

        $this->getCategories();
    }

    public function delete(Category $category)
    {
        $category->delete();
        $this->getCategories();
    }

    public function render()
    {
        return view('livewire.admin.create-cover')->layout('layouts.admin');;
    }
}
