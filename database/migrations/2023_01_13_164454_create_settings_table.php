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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('company_name')->nullable();
            $table->string('site_name')->nullable();
            $table->longText('address_line1')->nullable();
            $table->longText('address_line2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('pincode')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('email_alternative')->nullable();
            $table->string('logo_black')->nullable();
            $table->string('logo_white')->nullable();
            $table->string('favicon')->nullable();
            $table->string("slug", 150);
            $table->string('url')->nullable();
            $table->string('mobile_number',20)->nullable();
            $table->string('alternativemobile_number',20)->nullable();
            $table->string('whatapp_number', 20)->nullable();
            $table->string('telephone', 20)->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
