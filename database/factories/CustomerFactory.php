<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Definprot
     *
     * e the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'dob' => fake()->date(),
            'email' => fake()->email(),
            'password' => Hash::make('captainA'),
            'phonenumber' => fake()->phoneNumber(),
            'place' => fake()->city(),
            'address' => fake()->address(),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }

    public function testCustomer(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'first_name' => 'Test',
                'last_name' => 'User',
                'email' => 'test@example.com',
                'password' => Hash::make('captainMarvel'),
                'status' => 'active',
            ];
        });
    }
    
}
