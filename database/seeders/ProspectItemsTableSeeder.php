<?php

namespace Database\Seeders;

use App\Models\ProspectItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProspectItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Let's assume each prospect gets between 1 to 5 products
         $prospectId = $options['prospect_id'] ?? null;

         if (!$prospectId) return; // Ensure prospect ID is provided

         for ($j = 0; $j < rand(1, 5); $j++) {
             ProspectItem::create([
                 'prospect_id' => $prospectId,
                 'product_id' => rand(1, 20),  // Assuming you have at least 20 products seeded
                 'price' => $price = rand(100, 500),
                 'total_payment' => $price * rand(1, 3)  // Price times quantity (for simplicity)
             ]);
         }
    }
}
