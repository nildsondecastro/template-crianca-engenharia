<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('id_events');

            $table->string('name');
            $table->text('description');

            $table->boolean('active')->default(true);

            $table->dateTime('start_registration_volunteers');
            $table->dateTime('end_registration_volunteers');

            $table->dateTime('start_registration_schools');
            $table->dateTime('end_registration_schools');

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
        Schema::dropIfExists('events');
    }
}
