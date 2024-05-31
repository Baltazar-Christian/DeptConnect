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
        Schema::create('prospects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->decimal('payment_amount', 10, 2);
            $table->unsignedInteger('installment_plan');
            $table->string('credit_form_url')->nullable();
            $table->enum('prospect_type', ['presentation', 'cash', 'credit']);
            $table->decimal('paid_amount', 10, 2)->default(0.00);
            $table->enum('status', ['presentation', 'unpaid', 'full paid', 'partially paid']);
            $table->date('payment_deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prospects');
    }
};
