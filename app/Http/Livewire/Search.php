<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $search;

    public $open = false;

    public function updatedSearch($value){
        if($value){
            $this->open = true;
        }else{
            $this->open = false;
        }
    }

    public function render()
    {

        
                /*Con los signos de porcentajes en la consulta dejo dicho que puede haber algo antes o despues 
                lo que se escriba en el buscador*/
        if ($this->search) {
            $products = Product::where('name', 'LIKE' ,"%" . $this->search . "%")
                                    ->where('status', 2)
                                    ->take(8) //con take limito la cantidad de producto que quiero mostrar
                                    ->get();
        } else {
            $products = [];
        }
        
        return view('livewire.search', compact('products'));
    }
}
