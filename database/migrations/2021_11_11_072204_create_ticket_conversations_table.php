<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_conversations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_id')->unsigned()->nullable();
            $table->integer('message_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();

            $table->unique(['ticket_id','message_id','user_id']);
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('set null');
            $table->foreign('message_id')->references('id')->on('ticket_messages')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_conversations');
    }
}
