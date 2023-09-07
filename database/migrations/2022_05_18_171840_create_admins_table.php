<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('uuid')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->enum('gender',['Male','Female','Other'])->nullable();
            $table->string('image')->nullable();
            $table->date('dob')->nullable();
            $table->enum('disable',['YES','NO'])->default('NO');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('reset_link')->unique()->nullable();
            $table->integer('otp')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
