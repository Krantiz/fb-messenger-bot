<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacebookResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_responses', function (Blueprint $table) { 
            $table->increments('id');
            $table->integer('facebook_request_id')->unsigned();
            $table->string('text');
            $table->string('image');
            $table->string('buttons');
            $table->string('collections');
            $table->timestamps();
        });

        Schema::table('facebook_responses', function($table) {
            $table->foreign('facebook_request_id')->references('id')->on('facebook_requests')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facebook_responses');
    }
}
