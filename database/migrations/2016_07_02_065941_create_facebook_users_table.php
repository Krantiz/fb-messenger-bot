<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacebookUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_users', function (Blueprint $table) { 
            $table->increments('id');
            $table->string('user_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('profile_pic');
            $table->string('locale');
            $table->string('timezone');
            $table->string('gender');
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
        Schema::drop('facebook_users');
    }
}
