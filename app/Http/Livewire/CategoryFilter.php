<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends Component
{
    use WithPagination;

    public $category, $subcategoria, $marca;


    public $view = "grid";


    protected $queryString = ['subcategoria', 'marca'];

    public function limpiar(){
        $this->reset(['subcategoria', 'marca', 'page']);
    }


    public function updatedSubcategoria(){
        $this->resetPage();
    }

    public function updatedMarca(){
        $this->resetPage();
    }


    public function render()
    {

        $marcas = $this->category->brands()
            ->whereHas('products', function ($query) {
                $query->where('status', '2');
            })
            ->has('products', '>=', 1)
            ->select('name')
            ->get();
        /* $products = $this->category->products()
                            ->where('status', 2)->paginate(20); */

        $productsQuery = Product::query()->whereHas('subcategory.category', function(Builder $query){
            $query->where('id', $this->category->id);
        })->where('status', 2);

        if ($this->subcategoria) {
            $productsQuery = $productsQuery->whereHas('subcategory', function(Builder $query){
                $query->where('slug', $this->subcategoria);
            });
        }

        if ($this->marca) {
            $productsQuery = $productsQuery->whereHas('brand', function(Builder $query){
                $query->where('name', $this->marca);
            });
        }

        $products = $productsQuery->paginate(20);

        return view('livewire.category-filter', compact('products', 'marcas'));
    }
}