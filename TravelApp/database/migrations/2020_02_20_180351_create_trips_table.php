<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('destination');
            $table->string('starting_location');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            //$table->string('hostel');
            //$table->boolean('rental');
            $table->boolean('reason');
            $table->boolean('payer');
            $table->string('conference');
            $table->string('business_purpose');

            $table->string('file_location');
            
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
        Schema::dropIfExists('trips');
    }
}
