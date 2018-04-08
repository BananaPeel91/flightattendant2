<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatorAircraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operator_aircrafts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('operator_id')->unsigned();
            $table->integer('aircraft_id')->unsigned();
            $table->timestamps();

            $table->foreign('operator_id')->references('id')->on('operators');
            $table->foreign('aircraft_id')->references('id')->on('aircrafts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operator_aircrafts');
    }
}
