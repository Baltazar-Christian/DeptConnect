<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            [
                'name' => 'Apple MacBook Pro',
                'description' => 'Apple MacBook Pro 13-inch with TouchBar and Touch ID',
                'price' => 1299.99,
            ],
            [
                'name' => 'Samsung Galaxy S20',
                'description' => 'Samsung Galaxy S20 Ultra 5G smartphone',
                'price' => 999.99,
            ],
            [
                'name' => 'Google Pixel 4a',
                'description' => 'Google Pixel 4a - New Unlocked Android Smartphone',
                'price' => 349.99,
            ]
        ]);
    }
}
