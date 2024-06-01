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
            ],
            [
                'name' => 'Sony PlayStation 5',
                'description' => 'Sony PlayStation 5 Console',
                'price' => 499.99,
            ],
            [
                'name' => 'Microsoft Xbox Series X',
                'description' => 'Microsoft Xbox Series X 1TB Console',
                'price' => 499.99,
            ],
            [
                'name' => 'Apple iPad Air',
                'description' => 'Apple iPad Air 10.9-inch, Wi-Fi, 64GB - Latest Model',
                'price' => 599.99,
            ],
            [
                'name' => 'Dell XPS 13',
                'description' => 'Dell XPS 13 9300 13.4-inch FHD InfinityEdge Touch Laptop',
                'price' => 1549.99,
            ],
            [
                'name' => 'Bose QuietComfort 35 II',
                'description' => 'Bose QuietComfort 35 II Wireless Bluetooth Headphones',
                'price' => 299.99,
            ],
            [
                'name' => 'Nikon D3500',
                'description' => 'Nikon D3500 W/ AF-P DX NIKKOR 18-55mm f/3.5-5.6G VR',
                'price' => 496.95,
            ],
            [
                'name' => 'Canon EOS Rebel T7',
                'description' => 'Canon EOS Rebel T7 DSLR Camera Bundle with Canon EF-S 18-55mm',
                'price' => 449.00,
            ]
        ]);

    }
}
