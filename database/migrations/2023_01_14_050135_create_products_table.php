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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('category_uuid');
            $table->string('name')->nullable();
            $table->string("slug", 150);
            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->integer('market_price')->nullable();
            $table->integer('our_price')->nullable();
            $table->enum('active',['YES','NO'])->default('NO');
            $table->enum('discount_type',['percentage','number']);
            $table->integer('discount_value')->nullable();
            $table->string('uuid')->unique();
            $table->integer('quantity')->nullable();
            $table->string('image');
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
        Schema::dropIfExists('products');
    }
};
