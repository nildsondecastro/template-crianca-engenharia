<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id('id_volunteers');

            $table->unsignedbigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users');

            $table->unsignedbigInteger('id_events');
            $table->foreign('id_events')->references('id_events')->on('events');

            $table->unique(['id_users', 'id_events']);

            $table->string('institution');
            $table->integer('shift');//1-manhã, 2-tarde, 3-ambos

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
        Schema::dropIfExists('volunteers');
    }
}
