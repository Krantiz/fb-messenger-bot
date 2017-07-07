<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FixtureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fixtures')->delete();
       

        DB::table('fixtures')->insert(
            ['home_team_id' => '1', 'away_team_id' => '2', 'kickoff_time' => '2000-10-2 21:00:00','created_at' => new DateTime]
        );
        DB::table('fixtures')->insert(
            ['home_team_id' => '3', 'away_team_id' => '4', 'kickoff_time' => '2000-10-3 21:00:00','created_at' => new DateTime]
        );
        DB::table('fixtures')->insert(
            ['home_team_id' => '5', 'away_team_id' => '6', 'kickoff_time' => '2000-10-4 21:00:00','created_at' => new DateTime]
        );
        DB::table('fixtures')->insert(
            ['home_team_id' => '6', 'away_team_id' => '7', 'kickoff_time' => '2000-10-5 21:00:00','created_at' => new DateTime]
        );
        DB::table('fixtures')->insert(
            ['home_team_id' => '8', 'away_team_id' => '1', 'kickoff_time' => '2000-10-6 21:00:00','created_at' => new DateTime]
        );
    }
}
