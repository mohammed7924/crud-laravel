<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class CustomernewFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'dob' => $this->faker->date('Y-m-d', '2005-01-01'),
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // ✅ Hashed password
            'phonenumber' => $this->faker->phoneNumber,
            'place' => $this->faker->city,
            'address' => $this->faker->address,
            'status' => 'active'
        ];
    }
}
