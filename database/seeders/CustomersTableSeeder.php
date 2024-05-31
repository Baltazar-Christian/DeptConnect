<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'phone' => '1234567890',
                'address' => '1234 Elm Street'
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane.doe@example.com',
                'phone' => '0987654321',
                'address' => '5678 Maple Street'
            ],
            [
                'name' => 'Sam Smith',
                'email' => 'sam.smith@example.com',
                'phone' => '1029384756',
                'address' => '1357 Oak Avenue'
            ]
        ]);
    }
}
