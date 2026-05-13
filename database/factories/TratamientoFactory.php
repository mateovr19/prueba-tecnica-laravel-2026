<?php

namespace Database\Factories;

use App\Models\Tratamiento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tratamiento>
 */
class TratamientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descripcion' => fake()->sentence(),
            'dosis'=> fake()->optional()->randomElement(['10mg', '20mg', '50mg', '100mg']),
            'duracion' => fake()->optional()->randomElement(['1 semana', '2 semanas', '1 mes', '2 meses']),
        ];
    }
}
