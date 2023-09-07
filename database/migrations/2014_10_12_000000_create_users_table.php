<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_verification_link')->unique()->nullable();
            $table->string('password');
            $table->string('uuid')->unique();
            $table->string('mobile')->unique();
            $table->enum('disable',['YES','NO'])->default('NO');
            $table->enum('kyc',['Pending','Completed'])->default('Pending');
            $table->enum('plan_purchase',['YES','NO'])->default('NO');
            $table->string('reset_link')->unique()->nullable();
            $table->string('otp')->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
