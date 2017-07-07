<?php

use Illuminate\Database\Seeder;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('venues')->delete();

        DB::table('venues')->insert(
            ['stadium_name' => 'SALT LAKE STADIUM, KOLKATA', 'home_team_id' => '1','created_at' => new DateTime]
        );
        DB::table('venues')->insert(
            ['stadium_name' => 'JAWAHARLAL NEHRU STADIUM, CHENNAI', 'home_team_id' => '2','created_at' => new DateTime]
        );
        DB::table('venues')->insert(
            ['stadium_name' => 'JAWAHARLAL NEHRU STADIUM, DELHI', 'home_team_id' => '3','created_at' => new DateTime]
        );
        DB::table('venues')->insert(
            ['stadium_name' => 'JAWAHARLAL NEHRU STADIUM, FATORDA, GOA', 'home_team_id' => '4','created_at' => new DateTime]
        );
        DB::table('venues')->insert(
            ['stadium_name' => 'SHREE SHIV CHHATRAPATI SPORTS COMPLEX STADIUM, PUNE', 'home_team_id' => '5','created_at' => new DateTime]
        );
        DB::table('venues')->insert(
            ['stadium_name' => 'JAWAHARLAL NEHRU STADIUM, KOCHI', 'home_team_id' => '6','created_at' => new DateTime]
        );
        DB::table('venues')->insert(
            ['stadium_name' => 'D.Y. PATIL STADIUM, NAVI MUMBAI', 'home_team_id' => '7','created_at' => new DateTime]
        );
        DB::table('venues')->insert(
            ['stadium_name' => 'INDIRA GANDHI STADIUM, GUWAHATI', 'home_team_id' => '8','created_at' => new DateTime]
        );
    }
}
