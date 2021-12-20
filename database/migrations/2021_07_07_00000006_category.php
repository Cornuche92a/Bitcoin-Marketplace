<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('category', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('catname');
                $table->string('iconurl')->nullable();
                $table->string('bannerurl')->nullable();
                $table->string('iconstylesize');
                $table->decimal('price');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');

    }
}
