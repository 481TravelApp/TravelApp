<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TODO: add in field that assigns users a role similar to these:
		//		 1. normal user (can only see their own submissions)
		//		 2. admin (can approve or deny requests, can see all their department's submissions)
		//		 3. developer (can see everything, can do anything)
		Schema::create('users', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('username')->unique();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->rememberToken();
        $table->timestamps();
	    $table->integer('BSU_id');
	    $table->string('department');
	    //$table->date('birthday');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
