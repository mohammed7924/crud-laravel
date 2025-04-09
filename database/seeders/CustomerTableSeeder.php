<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Required for inserting data
use App\Models\Customer;
class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()->testCustomer()->create();
        Customer::factory()->count(5)->create();
    }

    
}
