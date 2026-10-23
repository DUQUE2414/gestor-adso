<?php

namespace Database\Factories;

use App\Models\Aprendiz;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Aprendiz>
 */
class AprendizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'documento' =>(string)$this->faker->unique()->numerify('##########'),
            'correo' =>$this->faker->unique()->safeEmail(),
            'ficha_id' =>(string)$this->faker->unique()->numerify('###')
        ];
    }
}
