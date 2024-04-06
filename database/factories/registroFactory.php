<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\registro>
 */
class registroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'usuario' => $this->faker->name(),
            'servicio' => $this -> faker -> randomElement(['Sunat','Reniec','Minedu','Inpe'])
        ];
    }
}
