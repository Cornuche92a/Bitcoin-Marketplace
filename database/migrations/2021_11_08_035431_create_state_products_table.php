<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('style');
            $table->timestamps();
        });

        DB::table('state_order')->insert([
            array(
                'name' => 'Actif',
                'style' => 'bg-success-light text-success'
            ),
            array(
                'name' => 'Annulé',
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
        Schema::dropIfExists('state_products');
    }
}
