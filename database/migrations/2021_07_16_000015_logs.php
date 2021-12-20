<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Logs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username_email_log');
            $table->string('password_pin_log')->nullable();
            $table->integer('seller_id')->unsigned()->default(1);
            $table->boolean('available')->default(1);
            $table->integer('category_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
