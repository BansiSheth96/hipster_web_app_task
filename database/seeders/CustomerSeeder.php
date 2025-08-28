<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::insert([
            [
                'c_name' => 'John Doe',
                'c_email' => 'john@example.com',
                'c_mobile_no' => '9000000004',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c_name' => 'Jane Smith',
                'c_email' => 'jane@example.com',
                'c_mobile_no' => '9000000005',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'c_name' => 'Alex Johnson',
                'c_email' => 'alex@example.com',
                'c_mobile_no' => '9000000006',
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
