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
            $table->uuid('facebook_user_id');
            $table->string('page_id');
            $table->string('session_id');
            $table->text('text');
            $table->string('attachment_url');
            $table->string('payload');
            $table->string('mid')->unique();
            $table->integer('seq');
            $table->boolean('unanswered')->default(false);
            $table->timestamps();
        });

        Schema::table('facebook_requests', function($table) {
            $table->foreign('facebook_user_id')->references('id')->on('facebook_users')->onDelete('restrict')->onUpdate('cascade');
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
