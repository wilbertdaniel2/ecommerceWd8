<?php

namespace Database\Seeders;

use App\Models\Capacity;
use Illuminate\Database\Seeder;

class ColorCapacitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $capacities = Capacity::all();

        foreach ($capacities as $capacity){
            $capacity->colors()
            ->attach([1 => ['quantity' => 10], 
                      2 => ['quantity' => 10], 
                      3 => ['quantity' => 10], 
                      4 => ['quantity' => 10]]);
        }
    }
}
