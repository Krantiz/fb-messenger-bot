<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeclareColumnsNullableInFacebookResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facebook_responses', function(Blueprint $table) {
            $table->string('text')->nullable()->change();
            $table->string('image')->nullable()->change();
            $table->string('buttons')->nullable()->change();
            $table->string('collections')->nullable()->change();         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facebook_responses', function(Blueprint $table) {
            $table->string('text')->change();
            $table->string('image')->change();
            $table->string('buttons')->change();
            $table->string('collections')->change();       
        });
    }
}
