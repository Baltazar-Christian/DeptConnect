<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name');
            $table->date('purchase_date');
            $table->decimal('total_amount');
            $table->string('efd_number');
            $table->decimal('installment_plan');
            $table->string('guarantor_name');
            $table->string('guarantor_phone');
            $table->string('office_location');
            $table->string('home_location');
            $table->string('plot_number');
            $table->string('kin_name');
            $table->string('kin_phone');
            $table->string('hr_name');
            $table->string('hr_phone');
            $table->string('branch_name')->nullable();
            $table->string('company_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
