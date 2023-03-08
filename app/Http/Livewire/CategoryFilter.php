<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Product;

class CategoryFilter extends Component
{
    //Me permite que al cargar la paginacion sea dinamica y que no se recargue la pagina completa
    use WithPagination;

    public $category, $subcategoria, $marca;

    public $view = 'grid';

    public function limpiar(){
        $this->reset(['subcategoria', 'marca']);
    }

    public function render()
    {

        /*$products = $this->category->products()
                            ->where('status', 2)->paginate(20);*/

        $productsQuery = Product::query()->whereHas('subcategory.category', function(Builder $query){
        $query->where('id', $this->category->id);
        });  
        
        if ($this->subcategoria) {
            $productsQuery = $productsQuery->whereHas('subcategory', function(Builder $query){
                $query->where('name', $this->subcategoria);
            });
        }

        if ($this->marca){
            $productsQuery = $productsQuery->whereHas('brand', function(Builder $query){
                $query->where('name', $this->marca);
            });
        }

        $products = $productsQuery->paginate(20);

        return view('livewire.category-filter', compact('products'));
    }
}
