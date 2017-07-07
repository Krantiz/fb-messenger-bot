<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadGenerationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_generation', function (Blueprint $table) {
            $table->uuid('lead_id')->unique();
            $table->string('contact_number')->nullable();
            $table->string('city')->nullable();
            $table->string('room_type')->nullable();
            $table->timestamps();
        });

        Schema::table('lead_generation', function($table) {
            $table->foreign('lead_id')->references('id')->on('facebook_users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lead_generation');
    }
}
