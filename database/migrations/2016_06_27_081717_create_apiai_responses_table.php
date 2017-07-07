<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiaiResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apiai_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('facebook_request_id')->unsigned();
            $table->boolean('action_incomplete')->nullable();
            $table->string('action')->nullable();
            $table->text('parameters')->nullable();
            $table->text('fulfillment')->nullable();
            $table->string('intent_name')->nullable();
            $table->timestamps();
        });

        Schema::table('apiai_responses', function($table) {
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
        Schema::drop('apiai_responses');
    }
}
