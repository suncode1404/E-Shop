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
        Schema::create('order_payment', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->timestamps();
        });

        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('status_id')->constrained('status')->default(1);
            $table->foreignId('payment_id')->constrained('order_payment');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->string('customer_notes',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_payment');
        Schema::dropIfExists('order');
    }
};
