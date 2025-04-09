<?php

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'dob' => '1990-05-15',
            'email' => 'john@example.com',
            'password' => 'password', // ✅ Auto-hashed (due to setPasswordAttribute in model)
            'phonenumber' => '1234567890',
            'place' => 'Test City',
            'status' => 'active'
        ]);
    }
}
