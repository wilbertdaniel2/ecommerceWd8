<?php

namespace Database\Seeders;


use App\Models\Department;
use App\Models\Municipality;
use App\Models\Neighborhood;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::factory(8)->create()->each(function(Department $department){
            Municipality::factory(8)->create([
                'department_id' => $department->id
            ])->each(function(Municipality $municipality){
                Neighborhood::factory(8)->create([
                    'municipality_id' => $municipality->id
                ]);
            });
        });
    }
}
