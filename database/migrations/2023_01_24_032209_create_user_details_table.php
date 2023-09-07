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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('age')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('user_id')->uniqid();
            $table->string('image')->nullable();
            $table->string('id_card_image')->nullable();
            $table->string('uuid')->unique();
            $table->enum('sex',['Male','Female','Other'])->nullable();
            $table->string('id_card_type')->nullable();
            $table->string('id_card_number')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('account_number')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('user_details');
    }
};
