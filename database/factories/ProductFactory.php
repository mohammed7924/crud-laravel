<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {




        return [
            'name' => $this->faker->words(2,true),
            'description' => $this->faker->paragraph(2),
            'price' => $this->faker->randomFloat(2, 100, 50000),
            'category_id' => $this->faker->numberBetween(1, 5),

        ];
    }
}
