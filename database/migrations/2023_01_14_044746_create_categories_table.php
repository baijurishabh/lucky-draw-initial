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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("slug", 150);
            $table->string('name');
            $table->longText('description');
            $table->enum('active',['YES','NO'])->default('NO');
            $table->enum('discount_type',['percentage','number']);
            $table->string('uuid')->unique();
            $table->enum('product_type',['electronic','non-electronic']);
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
        Schema::dropIfExists('categories');
    }
};
