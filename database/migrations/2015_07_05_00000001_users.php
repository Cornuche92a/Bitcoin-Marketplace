<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();
            $table->integer('avatar_id')->unsigned()->default(3);
            $table->foreign('avatar_id')->references('id')->on('avatars')->onUpdate('cascade');
            $table->string('ip_register')->nullable();
            $table->string('ip_last')->nullable();
            $table->dateTime('date_own', $precision = 0)->nullable();
            $table->rememberToken()->nullable();
            $table->decimal('amount')->default(0);
            $table->boolean('admin')->default(0);
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
