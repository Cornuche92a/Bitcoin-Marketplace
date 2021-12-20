<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('style');
            $table->timestamps();
        });

        DB::table('states')->insert([
            array(
                'name' => 'Actif',
                'style' => 'bg-success-light text-success'
            ),
            array(
                'name' => 'Fermé',
                'style' => 'bg-dark text-dark'
            ),
            array(
                'name' => 'Remboursé',
                'style' => 'bg-warning-light text-warning'
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
        Schema::dropIfExists('states');
    }
}
