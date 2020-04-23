<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Currently unused, but should be used in the future
class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('airline');
            $table->bigInteger('preffly_num');
            $table->timestamp('depart_time');
            $table->string('seating_choice');
            $table->string('contact');
            $table->string('lodging');
            $table->string('hosted_reward_num');
            $table->string('room_details');
            $table->string('admin_email');
            $table->string('dup_email');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preferences');
    }
}
