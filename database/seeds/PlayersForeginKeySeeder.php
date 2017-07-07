<?php

use Illuminate\Database\Seeder;

class PlayersForeginKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        



        //Players Foreign Key added


// Goa players....
        
        DB::table('players')->where('name', '=', 'Lucimar Ferreira da Silva')->update(
            array(            
                'nationality_id' => DB::table('countries')->where('name', '=', 'Brazil')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Defender')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id

            )
        );
        DB::table('players')->where('name', '=', 'Luciano Sobrosa')->update(
            array(
                'nationality_id' => DB::table('countries')->where('name', '=', 'Brazil')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Defender')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Gregory Arnolin')->update(
            array(                
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Defender')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'DEBABRATA ROY')->update(
            array(               
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Defender')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'KEENAN ALMEIDA')->update(
            array(               
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Defender')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Nicolau Colaco')->update(
            array(               
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Defender')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Narayan Das')->update(
            array(                
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Defender')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Romeo Fernandes')->update(
            array(               
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Midfielder')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Leonardo da Silva Moura')->update(
            array(
               
                'nationality_id' => DB::table('countries')->where('name', '=', 'Brazil')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Midfielder')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Jonatan Lucca')->update(
            array(
              
                'nationality_id' => DB::table('countries')->where('name', '=', 'Brazil')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Midfielder')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Joffre Mateu González')->update(
            array(
               
                'nationality_id' => DB::table('countries')->where('name', '=', 'Spain')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Midfielder')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Mandar Rao Dessai')->update(
            array(
                
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Midfielder')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Denson Devadas')->update(
            array(
               
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Midfielder')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
       
        DB::table('players')->where('name', '=', 'Bikramjit Singh')->update(
            array(
               
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Midfielder')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Pronay Halder')->update(
            array(
              
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Midfielder')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'MacPherlin Dudu Omagbemi')->update(
            array(
             
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Forward')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Reinaldo da Cruz Oliveira')->update(
            array(
             
                'nationality_id' => DB::table('countries')->where('name', '=', 'Brazil')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Forward')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Rafael Coelho Luiz')->update(
            array(

                'nationality_id' => DB::table('countries')->where('name', '=', 'Brazil')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Forward')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Thongkhosiem Haokip')->update(
            array(
               
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Forward')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Chinadorai Sathyan Sabeeth')->update(
            array(
               
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Forward')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Joaquim Santan Abranches')->update(
            array(
                
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Forward')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Victorino Fernadnes')->update(
            array(
               
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Forward')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Elinton Sanchotene Andrade')->update(
            array(
               
                'nationality_id' => DB::table('countries')->where('name', '=', 'Brazil')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Goalkeeper')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Laxmikant Kattimani')->update(
            array(
                
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Goalkeeper')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Luis Xavier Barreto')->update(
            array(
              
                'nationality_id' => DB::table('countries')->where('name', '=', 'India')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Goalkeeper')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'Arthur Antunes Coimbra')->update(
            array(
             
                'nationality_id' => DB::table('countries')->where('name', '=', 'Brazil')->first()->id,
                'position_id' => DB::table('player_positions')->where('name', '=', 'Coach')->first()->id,
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );


        //New singing players

        DB::table('players')->where('name', '=', 'Lucimar Ferreira da Silva')->update(
            array(
                'is_new_signing' => true
            )
        );




        // players Entries

        DB::table('players')->where('name', '=', 'AMRINDER SINGH')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Atletico de Kolkata')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'JUAN JESUS CALATAYUD SÁNCHEZ')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Atletico de Kolkata')->first()->id
            )
        );


        DB::table('players')->where('name', '=', 'APOULA EDIMA EDEL BETE')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Chennaiyin FC')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'KARANJIT SINGH')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Chennaiyin FC')->first()->id
            )
        );


        DB::table('players')->where('name', '=', 'ROBERTO CARLOS')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Delhi Dynamos FC')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'ANTONIO DOBLAS SANTANA')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Delhi Dynamos FC')->first()->id
            )
        );


        DB::table('players')->where('name', '=', 'BIKASH JAIRU')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'FC Pune City')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'DIDIER ZOKORA')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'FC Pune City')->first()->id
            )
        );



        DB::table('players')->where('name', '=', 'SANDIP NANDY')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Kerala Blasters FC')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'CHRIS DAGNALL')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Kerala Blasters FC')->first()->id
            )
        );



        DB::table('players')->where('name', '=', 'Subrata Paul')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Mumbai City FC')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'JUAN AGUILERA NUNEZ')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Mumbai City FC')->first()->id
            )
        );



        DB::table('players')->where('name', '=', 'GENNARO BRACIGLIANO')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Northeast United FC')->first()->id
            )
        );
        DB::table('players')->where('name', '=', 'LALTHUAMMAWIA RALTE')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Northeast United FC')->first()->id
            )
        );



    }
}
