<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('trip_id')->references('id')->on('trips');
            $table->string('per_diem');
            $table->integer('flight_num');
            $table->string('baggage')->nullable();
            $table->string('lodging');
            $table->string('transportation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip_expenses');
    }
}