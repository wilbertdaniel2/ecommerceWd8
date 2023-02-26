<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Storage::deleteDirectory('products');
        Storage::deleteDirectory('categories');
        Storage::deleteDirectory('subcategories');

        Storage::makeDirectory('products');
        Storage::makeDirectory('categories');
        Storage::makeDirectory('subcategories');


        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);

        $this->call(ProductSeeder::class);

        $this->call(ColorSeeder::class);
        $this->call(ColorProductSeeder::class);

        $this->call(CapacitySeeder::class);
        $this->call(DetailSeeder::class);

    }
}
