<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve department IDs
        $management = DB::table('departments')->where('name', 'Management')->first();
        $sales = DB::table('departments')->where('name', 'Sales')->first();
        $collection = DB::table('departments')->where('name', 'Collection')->first();
        $accountants = DB::table('departments')->where('name', 'Accountants')->first();

        // Insert a user for each department
        DB::table('users')->insert([
            [
                'name' => 'Manager User',
                'email' => 'manager@example.com',
                'password' => Hash::make('password'),
                'department_id' => $management->id
            ],
            [
                'name' => 'Sales User',
                'email' => 'sales@example.com',
                'password' => Hash::make('password'),
                'department_id' => $sales->id
            ],
            [
                'name' => 'Collection User',
                'email' => 'collection@example.com',
                'password' => Hash::make('password'),
                'department_id' => $collection->id
            ],
            [
                'name' => 'Accountant User',
                'email' => 'accountant@example.com',
                'password' => Hash::make('password'),
                'department_id' => $accountants->id
            ],
        ]);
    }
}
