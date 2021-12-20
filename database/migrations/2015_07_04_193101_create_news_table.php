<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('new_tittle');
            $table->string('new_body');
            $table->timestamps();
        });

        DB::table('news')->insert([
            array(
                'new_tittle' => 'Ouverture !',
                'new_body'  =>  'Pour notre ouverture nous vous proposons plus de 10.000 Abonnements de toutes catégories !',
            ),
            array(
                'new_tittle' => 'Un cadeau ?',
                'ne_body'  =>  'Rechargez 30€ Bitcoins et gagnez un abonnement au hasard ! <small><i>(temporaire)</i></small>',
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
        Schema::dropIfExists('news');
    }
}
