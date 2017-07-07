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
            $table->uuid('msg_id')->nullable();;
            $table->string('action_incomplete')->nullable();
            $table->string('action')->nullable();
            $table->text('parameters')->nullable();
            $table->text('fulfillment')->nullable();
            $table->text('intent_name')->nullable();
            $table->integer('facebook_request_id')->unsigned();
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
