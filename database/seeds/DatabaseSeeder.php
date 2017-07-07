<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        //New seeders

        $this->call(PlayersSeeder::class);
        $this->call(TeamsSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(PlayersPositionsSeeder::class);
        $this->call(PlayersForeginKeySeeder::class); 
        $this->call(TeamsForeignKeySeeder::class);
        $this->call(VenueSeeder::class);
        $this->call(FixtureSeeder::class);
        $this->call(ProductTypeSeeder::class);  
        $this->call(ProductSeeder::class);     
        $this->call(NewsSeeder::class);
        $this->call(PartnersSeeder::class);
       
       
    }
}
