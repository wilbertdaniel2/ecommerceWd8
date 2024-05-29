<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

use Illuminate\Support\Str;

use Livewire\WithFileUploads;

class CreateCategory extends Component
{
    use WithFileUploads;

    public $brands, $categories, $category, $rand;

    protected $listeners = ['delete'];

    public $createForm = [
        'name' => null,
        'slug' => null,
        'icon' => null,
        'url' => null,
        'image' => null,
        'image_banner' => null,
        'brands' => [],
    ];

    public $editForm = [
        'open' => false,
        'name' => null,
        'slug' => null,
        'icon' => null,
        'url' => null,
        'image' => null,
        'image_banner' => null,
        'brands' => [],
    ];

    public $editImage;
    public $editImageBanner;

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.slug' => 'required|unique:categories,slug',
        'createForm.icon' => 'required',
        'createForm.url' => 'required',
        'createForm.image' => 'required|image|max:1024',
        'createForm.image_banner' => 'required|image|max:1024',
        'createForm.brands' => 'required'
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.slug' => 'slug',
        'createForm.icon' => 'icono',
        'createForm.url' => 'url',
        'createForm.image' => 'imagen',
        'createForm.image_banner' => 'banner',
        'createForm.brands' => 'marcas',
        'editForm.name' => 'nombre',
        'editForm.slug' => 'slug',
        'editForm.icon' => 'icono',
        'editForm.url' => 'url',
        'editForm.image' => 'imagen',
        'editForm.image_banner' => 'banner',
        'editForm.brands' => 'marcas'
    ];

    public function mount()
    {
        $this->getBrands();
        $this->getCategories();
        $this->rand = rand();
    }

    public function updatedCreateFormName($value)
    {
        $this->createForm['slug'] = Str::slug($value);
    }

    public function updatedEditFormName($value)
    {
        $this->editForm['slug'] = Str::slug($value);
    }

    public function getBrands()
    {
        $this->brands = Brand::all();
    }

    public function getCategories()
    {
        $this->categories = Category::all();
    }

    public function save()
    {
        $this->validate();


        $image = $this->createForm['image']->store('categories');
        $image_banner = $this->createForm['image_banner']->store('categories');

        $category = Category::create([
            'name' => $this->createForm['name'],
            'slug' => $this->createForm['slug'],
            'icon' => $this->createForm['icon'],
            'url' => $this->createForm['url'],
            'image_banner' => $image_banner,
            'image' => $image
        ]);

        $category->brands()->attach($this->createForm['brands']);

        $this->rand = rand();

        $this->reset('createForm');

        $this->getCategories();

        $this->emit('saved');
    }

    public function edit(Category $category)
    {

        $this->reset(['editImage']);
        $this->resetValidation();
        $this->category = $category;

        $this->editForm['open'] = true;
        $this->editForm['name'] = $category->name;
        $this->editForm['slug'] = $category->slug;
        $this->editForm['icon'] = $category->icon;
        $this->editForm['url'] = $category->url;
        $this->editForm['image'] = $category->image;
        $this->editForm['image_banner'] = $category->image_banner;
        $this->editForm['brands'] = $category->brands->pluck('id');
    }

    public function update()
    {

        $rules = [
            'editForm.name' => 'required',
            'editForm.slug' => 'required|unique:categories,slug,' . $this->category->id,
            'editForm.icon' => 'required',
            'editForm.url' => 'required',
            'editForm.brands' => 'required',
        ];

        if ($this->editImage) {
            $rules['editImage'] = 'required|image|max:1024';
        }

        if ($this->editImageBanner) {
            $rules['editImageBanner'] = 'required|image|max:1024';
        }

        $this->validate($rules);

        if ($this->editImage) {
            Storage::delete($this->editForm['image']);
            $this->editForm['image'] = $this->editImage->store('categories');
        }

        if ($this->editImageBanner) {
            Storage::delete($this->editForm['image_banner']);
            $this->editForm['image_banner'] = $this->editImageBanner->store('categories');
        }

        $this->category->update($this->editForm);

        $this->category->brands()->sync($this->editForm['brands']);

        $this->reset(['editForm', 'editImage', 'editImageBanner']);

        $this->getCategories();
    }

    public function delete(Category $category)
    {
        $category->delete();
        $this->getCategories();
    }

    public function render()
    {
        return view('livewire.admin.create-category');
    }
}
