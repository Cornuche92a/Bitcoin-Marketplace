<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('notif_class');

            $table->timestamps();


        });
        DB::table('notifications_types')->insert([
            array(
                'description' => 'Nouveau message du support',
                'notif_class' => 'si si-fw si-bubbles text-primary'
            ),
            array(
                'discription' => 'Votre portefeuille a été approvisionné',
                'notif_class' => 'fab fa-fw fa-bitcoin text-warning'
            ),
            array(
                'description' => 'Nouvel abonnement activé !',
                'notif_class' => 'fa fa-fw fa-check-circle text-success'
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
        Schema::dropIfExists('notifications_types');
    }
}
