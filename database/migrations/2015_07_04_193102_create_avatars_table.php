<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvatarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avatars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('avatar');
        });

        DB::table('avatars')->insert([
            array(
                'avatar' => 'avatar1.png'
            ),
            array(
                'avatar' => 'avatar2.png'
            ),
            array(
                'avatar' => 'avatar3.png',
            ),
            array(
                'avatar' => 'avatar4.png',
            ),
            array(
                'avatar' => 'avatar5.png',
            ),
            array(
                'avatar' => 'avatar6.png',
            ),
            array(
                'avatar' => 'avatar7.png',
            ),
            array(
                'avatar' => 'avatar8.png',
            )
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avatars');
    }
}
