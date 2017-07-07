<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvironmentPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('maintainance_mode')->default(false);
            $table->timestamps();
        });

        // Add the single entry
        DB::table('environment_properties')->insert(
            array(
                [
                'maintainance_mode' => false,
                'created_at' => new DateTime       
                ]
                )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('environment_properties');
    }
}
