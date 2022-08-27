<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Temperature>
 */
class TemperatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $id = 1;
        if ($id == 4) {
            $id = 1;
        }
        return [
            'sensor_id' => $id++,
            'temp'      => fake()->randomFloat(2, 26, 33),
            'pres'      => fake()->randomFloat(2, 100, 200)
        ];
    }
}
