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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code')->unique();
            $table->foreignId('user_id');
            $table->foreignId('promotion_id')->nullable();
            $table->date('date');
            $table->string('contact_first_name');
            $table->string('contact_last_name');
            $table->string('contact_email');
            $table->string('contact_phone');
            $table->string('delivery_address');
            $table->string('delivery_date');
            $table->string('delivery_time');
            $table->double('subtotal');
            $table->double('discount')->default(0);
            $table->double('total');
            $table->string('snap_token')->nullable();
            $table->enum('payment_status', ['UNPAID', 'PAID', 'CANCELLED', 'EXPIRED'])->default('UNPAID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
