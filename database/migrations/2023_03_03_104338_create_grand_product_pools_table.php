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
        Schema::create('grand_product_pools', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_id');
            $table->string('pool_id');
            $table->string("slug", 150);
            $table->string('description')->nullable();
            $table->string('uuid')->unique();
            $table->softDeletes();
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
        Schema::dropIfExists('grand_product_pools');
    }
};
