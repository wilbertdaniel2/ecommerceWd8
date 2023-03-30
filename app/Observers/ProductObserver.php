<?php

namespace App\Observers;
use App\Models\Product;
use App\Models\Subcategory;

class ProductObserver
{
    public function updated(Product $product){
        $subcategory_id = $product->subcategory_id;
        $subcategory = Subcategory::find($subcategory_id);

        if ($subcategory->size) {
            if ($product->colors->count()) {
                $product->colors()->detach();
            }
        }elseif ($subcategory->color) {
            if ($product->capacities()->count()) {
                foreach ($product->capacities as $capacity) {
                    $capacity->delete();
                }
            }
        }else {
            if ($product->colors->count()) {
                $product->colors()->detach();
            }
            if ($product->capacities()->count()) {
                foreach ($product->capacities as $capacity) {
                    $capacity->delete();
                }
            }
        }
    }
}
