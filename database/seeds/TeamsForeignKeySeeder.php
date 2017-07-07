<?php

use Illuminate\Database\Seeder;

class TeamsForeignKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //New columns added for Fcgoa

        DB::table('teams')->where('name', '=', 'FC Goa')->update(
            array(
                
                'slogan' => 'Forca Goa',
                'alternate_name' => 'Gaurs',
                'manager_id' => DB::table('players')->where('name', '=', 'Arthur Antunes Coimbra')->first()->id
            )
        );

        

        

        /*     teams Entries
        */
        DB::table('teams')->where('name', '=', 'Atletico de Kolkata')->update(
            array(
                'captain_id' => DB::table('players')->where('name', '=', 'AMRINDER SINGH')->first()->id,
                'marquee_player_id' => DB::table('players')->where('name', '=', 'JUAN JESUS CALATAYUD SÁNCHEZ')->first()->id
            )
        );
        DB::table('teams')->where('name', '=', 'Chennaiyin FC')->update(
            array(
                'captain_id' => DB::table('players')->where('name', '=', 'APOULA EDIMA EDEL BETE')->first()->id,
                'marquee_player_id' => DB::table('players')->where('name', '=', 'KARANJIT SINGH')->first()->id
            )
        );
        DB::table('teams')->where('name', '=', 'Delhi Dynamos FC')->update(
            array(
                'captain_id' => DB::table('players')->where('name', '=', 'ROBERTO CARLOS')->first()->id,
                'marquee_player_id' => DB::table('players')->where('name', '=', 'ANTONIO DOBLAS SANTANA')->first()->id
            )
        );
        DB::table('teams')->where('name', '=', 'FC Goa')->update(
            array(
                'captain_id' => DB::table('players')->where('name', '=', 'Keenan almeida')->first()->id,
                'marquee_player_id' => DB::table('players')->where('name', '=', 'Gregory Arnolin')->first()->id
            )
        );
        DB::table('teams')->where('name', '=', 'FC Pune City')->update(
            array(
                'captain_id' => DB::table('players')->where('name', '=', 'BIKASH JAIRU')->first()->id,
                'marquee_player_id' => DB::table('players')->where('name', '=', 'DIDIER ZOKORA')->first()->id
            )
        );
        DB::table('teams')->where('name', '=', 'Kerala Blasters FC')->update(
            array(
                'captain_id' => DB::table('players')->where('name', '=', 'SANDIP NANDY')->first()->id,
                'marquee_player_id' => DB::table('players')->where('name', '=', 'CHRIS DAGNALL')->first()->id
            )
        );
        DB::table('teams')->where('name', '=', 'Mumbai City FC')->update(
            array(
                'captain_id' => DB::table('players')->where('name', '=', 'Subrata Paul')->first()->id,
                'marquee_player_id' => DB::table('players')->where('name', '=', 'JUAN AGUILERA NUNEZ')->first()->id
            )
        );
        DB::table('teams')->where('name', '=', 'Northeast United FC')->update(
            array(
                'captain_id' => DB::table('players')->where('name', '=', 'GENNARO BRACIGLIANO')->first()->id,
                'marquee_player_id' => DB::table('players')->where('name', '=', 'LALTHUAMMAWIA RALTE')->first()->id
            )
        );


    }
}
