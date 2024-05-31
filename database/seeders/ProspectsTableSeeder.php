<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Prospect;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProspectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customerIds = Customer::pluck('id')->toArray();

        // Creating 10 sample prospects
        foreach ($customerIds as $customerId) {
            Prospect::create([
                'customer_id' => $customerId,
                'payment_amount' => rand(1000, 5000),
                'installment_plan' => rand(1, 12),
                'credit_form_url' => 'http://example.com/form.pdf',
                'prospect_type' => ['presentation', 'cash', 'credit'][rand(0, 2)],
                'paid_amount' => rand(500, 3000),
                'status' => ['presentation', 'unpaid', 'full paid', 'partially paid'][rand(0, 3)],
                'payment_deadline' => now()->addDays(rand(30, 90))
            ]);
        }
    }
}
