<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;


class DetailSeeder extends Seeder
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
                    ->where('capacity', true)
                    ->where('detail', true);
        })->get();

        $dimensions = ['20mts', '30mts', '40mts'];
        $net_weights = ['1kl', '2kl', '3kl'];
        $bluetoohs = ['relleno1', 'relleno2', 'relleno3'];
        $package_contents = ['relleno1', 'relleno2', 'relleno3'];
        $loading_ports = ['tipo A', 'tipo B', 'Tipo C'];
        $battery_durations = ['1h', '2h', '3h'];
        $connection_distances = ['1mt', '2mt', '3mt'];

        foreach ($products as $product){

            foreach($dimensions as $dimension){
                foreach ($net_weights as $net_weight){
                    foreach($bluetoohs as $bluetooh){
                        foreach($package_contents as $package_content){
                            foreach($loading_ports as $loading_port){
                                foreach($battery_durations as $battery_duration){
                                    foreach($connection_distances as $connection_distance){
                                        $product->detail()->create([
                                            'dimension' => $dimension,
                                            'net_weight' => $net_weight,
                                            'bluetooh' => $bluetooh,
                                            'package_content' => $package_content,
                                            'loading_port' => $loading_port,
                                            'battery_duration' => $battery_duration,
                                            'connection_distance' => $connection_distance
                                        ]);
                                    }
                                    
                                }
                                
                            }
                            
                        }
                       
                    }
                    
                }
                
            }
            
        }
    }
}
