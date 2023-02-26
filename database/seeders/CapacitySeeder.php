<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;

class CapacitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::whereHas('subcategory', function(Builder $query){
            $query->where('color', true)
                    ->where('capacity', true);
        })->get();

        $capacities = ['2GB+16GB', '3GB+16GB', '4GB+32GB'];

        foreach ($products as $product){

            foreach($capacities as $capacity){
                $product->capacity()->create([
                    'name' => $capacity
                ]);
            }
            
        }
    }
 
}
