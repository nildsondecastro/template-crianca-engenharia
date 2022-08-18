<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoldingsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holdings_items', function (Blueprint $table) {
            $table->id('id_holdings_items');

            $table->integer('type');
            $table->integer('order');

            $table->string('path_img')->nullable();
            $table->text('text')->nullable();
            $table->text('path_file')->nullable();

            $table->unsignedbigInteger('id_holdings');
            $table->foreign('id_holdings')->references('id_holdings')->on('holdings');

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
        Schema::dropIfExists('holdings_items');
    }
}
