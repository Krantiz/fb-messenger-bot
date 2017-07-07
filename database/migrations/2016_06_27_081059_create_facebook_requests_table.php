<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacebookRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_requests', function (Blueprint $table) { 
            $table->increments('id');
            $table->bigInteger('timestamp');
            $table->string('sender_id');
            $table->string('page_id');
            $table->text('text');
            $table->string('mid')->unique();
            $table->integer('seq');
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
        Schema::drop('facebook_requests');
    }
}
