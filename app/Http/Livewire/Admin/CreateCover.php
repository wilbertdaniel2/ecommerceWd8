<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cover;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
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
        'open' => false,
        'image_path' => false,
        'title' => null,
        'start_at' => null,
        'end_at' => null,
        'is_active' => true
    ];

    public $editImage;

    protected $rules = [
        'createForm.image_path' => 'required|image|dimensions:min_width=1476,min_height=348|max:1024',
        'createForm.title' => 'required',
        'createForm.start_at' => 'required|date',
        //'createForm.end_at' => 'required',
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

    public function edit($coverId)
    {

        $this->reset(['editImage']);
        $this->resetValidation();
        $this->cover = Cover::findOrFail($coverId);
        //dd($this->cover);
        //dd($this->editForm['open']);
        $this->editForm['open'] = true;
        $this->editForm['image_path'] = $this->cover->image_path;
        $this->editForm['title'] = $this->cover->title;
        $this->editForm['start_at'] = Carbon::createFromDate($this->cover->start_at)->isoFormat('Y-MM-DD');
        $this->editForm['end_at'] = Carbon::createFromDate($this->cover->end_at)->isoFormat('Y-MM-DD');
        $this->editForm['is_active'] = $this->cover->is_active;

        //$this->editForm['brands'] = $category->brands->pluck('id');
    }

    public function update()
    {

        $rules = [
            'editForm.title' => 'required',
            'editForm.start_at' => 'required',
            'editForm.end_at' => 'required',
            'editForm.is_active' => 'required',
        ];

        if ($this->editImage) {
            $rules['editImage'] = 'required|image|max:1024';
        }

        $this->validate($rules);

        if ($this->editImage) {
            Storage::delete($this->editForm['image_path']);
            $this->editForm['image_path'] = $this->editImage->store('covers');
        }

        $this->cover->update($this->editForm);

        // $this->cover->brands()->sync($this->editForm['brands']);

        $this->reset(['editForm', 'editImage']);

        $this->getCovers();
    }

    public function delete(Cover $cover)
    {
        $cover->delete();
        $this->getCovers();
    }

    public function render()
    {
        return view('livewire.admin.create-cover')->layout('layouts.admin');;
    }
}
