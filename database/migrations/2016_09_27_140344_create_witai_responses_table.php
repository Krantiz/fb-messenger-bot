<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWitaiResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('witai_responses', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('msg_id');
            $table->integer('facebook_request_id')->unsigned();
            $table->string('action')->nullable();
            $table->text('parameters')->nullable();
            $table->timestamps();
        });

        Schema::table('witai_responses', function($table) {
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
        Schema::drop('witai_responses');
    }
}
