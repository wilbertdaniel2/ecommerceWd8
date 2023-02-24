<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     * 
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => 'categories/' . $this->faker->image('public/storage/categories', 640, 480, null, false) // Si lo dejo en true va a indicar la direccion completa de la imagen
            //si lo dejo en false va a indicar el nombre de la carpeta junto con el nombre del archivo
        ];
    }
}
