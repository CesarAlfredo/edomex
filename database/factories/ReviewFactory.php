<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //definimos para hacerle testing 
            'titulo'=> $this->faker->sentence(5),
            'review'=> $this->faker->sentence(20),
            //con esto probamos que no se corte el unique ID y la extencion de la imagen
            'imagen'=> $this->faker->uuid() . '.jpg',
            // como los ID que se crean en la tabla no son consecutivos usamos random Element
            'user_id'=> $this->faker->randomElement([2,3,4,5,6])
        ];
    }
}
