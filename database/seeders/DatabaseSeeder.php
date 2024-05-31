<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\DepartmentSeeder;
use Illuminate\Database\Seeder;
use  Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            DepartmentSeeder::class,
            UserSeeder::class,
            CustomersTableSeeder::class,
            ProductsTableSeeder::class,
            ProspectsTableSeeder::class,
            ProspectItemsTableSeeder::class,
        ]);
    }
}
