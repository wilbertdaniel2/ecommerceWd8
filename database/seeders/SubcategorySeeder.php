<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            /*Celulares y tablets*/ 
            [
                'category_id' => 1,
                'name' => 'Celulares y smartphone',
                'slug' => Str::slug('Celulares y smartphone'),
                'color' => true,
                'capacity' => false,   
            ],
            [
                'category_id' => 1,
                'name' => 'Accesorios para celulares',
                'slug' => Str::slug('Accesorios para celulares')    
            ],
            [
                'category_id' => 1,
                'name' => 'Smartwatches',
                'slug' => Str::slug('Smartwatches')    
            ],

            /*Tv y audios*/ 

            [
                'category_id' => 2,
                'name' => 'Tv y audio',
                'slug' => Str::slug('Tv y audio')                
            ],
            [
                'category_id' => 2,
                'name' => 'Audios',
                'slug' => Str::slug('Audios')    
            ],
            [
                'category_id' => 2,
                'name' => 'Audio para autos',
                'slug' => Str::slug('Audio para autos')    
            ],

            /*Consola y videojuegos*/
            [
                'category_id' => 3,
                'name' => 'Xbox',
                'slug' => Str::slug('Xbox'),                   
            ],
            [
                'category_id' => 3,
                'name' => 'Play Station',
                'slug' => Str::slug('Play Station')    
            ],
            [
                'category_id' => 3,
                'name' => 'Pc',
                'slug' => Str::slug('Pc')    
            ],
            [
                'category_id' => 3,
                'name' => 'Nintendo',
                'slug' => Str::slug('Nintendo')    
            ],

            /*Computacion*/ 

            [
                'category_id' => 4,
                'name' => 'Portatiles',
                'slug' => Str::slug('Portatiles'),
                'color' => true,
                'capacity' => true,
            ],
            [
                'category_id' => 4,
                'name' => 'Pc escritorio',
                'slug' => Str::slug('Pc escritorio'),
                'color' => true,
                'capacity' => true,                  
            ],
            [
                'category_id' => 4,
                'name' => 'Almacenamiento',
                'slug' => Str::slug('Almacenamiento')    
            ],
            [
                'category_id' => 4,
                'name' => 'Accesorios',
                'slug' => Str::slug('Accesorios')    
            ],

            /*Moda*/ 

            [
                'category_id' => 5,
                'name' => 'Mujeres',
                'slug' => Str::slug('Mujeres')    
            ],
            [
                'category_id' => 5,
                'name' => 'Hombres',
                'slug' => Str::slug('Hombres')    
            ],
            [
                'category_id' => 5,
                'name' => 'Lentes',
                'slug' => Str::slug('Lentes')    
            ],
            [
                'category_id' => 5,
                'name' => 'Relojes',
                'slug' => Str::slug('Relojes')    
            ],
            
        ];

        foreach ($subcategories as $subcategory){


            Subcategory::factory(1)->create($subcategory);
        }
    }
}
