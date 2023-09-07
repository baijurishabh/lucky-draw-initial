<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->integer('user_id');
            $table->integer('invoice_id');
            $table->string('product_name');
            $table->bigInteger('product_price');
            $table->integer('quantity')->default('1');
            $table->string('transaction_id')->nullable();
            $table->enum('payment_status',['Paid','Un paid']);
            $table->enum('status',['Confirmed','Packed','Dispatched','Shipped','Out for delivery','Delivered'])->default('Confirmed');
            $table->enum('mode',['Razorpay','UPI','Cash','Card','Bank transfer']);
            $table->string('category_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
