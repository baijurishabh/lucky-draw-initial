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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('uuid')->unique();
            $table->integer('amount');
            $table->integer('product_id')->nullable();
            $table->string('rzp_payment_id')->nullable();
            $table->string('rzp_order_id')->nullable();
            $table->string('rzp_signature')->nullable();
            $table->string('transaction_id')->nullable();
            $table->enum('mode',['Razorpay','UPI','Cash','Card','Bank transfer']);
            $table->enum('type',['Online','Offline'])->default('Online');
            $table->enum('status',['success','failed','refunded']);
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
        Schema::dropIfExists('payments');
    }
};
