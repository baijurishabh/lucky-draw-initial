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
        Schema::table('products', function (Blueprint $table) {
            $table->enum('special_deal',['YES','NO'])->default('NO');
            $table->enum('popular',['YES','NO'])->default('NO');
            $table->enum('recommendation',['YES','NO'])->default('NO');
            $table->string('online_price')->nullable();
            $table->enum('best_price',['YES','NO'])->default('NO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
