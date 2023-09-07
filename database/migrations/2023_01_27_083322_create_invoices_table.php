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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('invoice_number')->unique();
            $table->integer('user_id');
            $table->integer('employee_id')->nullable();
            $table->integer('payment_id')->unique();
            $table->enum('status',['Paid','Unpaid']);
            $table->date('payment_received_date')->nullable();
            $table->integer('amount');
            $table->integer('pool_id')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
