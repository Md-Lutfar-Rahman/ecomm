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
        
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->Integer('cart_id');
            
            $table->dateTime('order_date');

            $table->string('order_status');

            $table->decimal('total_amount', 10, 2);

            $table->string('payment_status');

            $table->text('shipping_address');

            $table->text('billing_address');

            $table->string('shipping_method')->nullable();

            $table->string('payment_method')->nullable();

            // Add any additional fields as needed
            $table->timestamps();
            
        });
        
      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
