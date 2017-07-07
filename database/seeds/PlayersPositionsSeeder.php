<?php

use Illuminate\Database\Seeder;

class PlayersPositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('player_positions')->delete();

        DB::table('player_positions')->insert(
            array([
                'name' => 'Defender',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Forward',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Midfielder',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Goalkeeper',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Coach',
                'created_at' => new DateTime
                ])
        );

        //Synonyms added to players positions..

        DB::table('player_positions')->where('name', '=', 'Defender')->update(
            array( 
                'synonyms' => 'defender; defense; defending player; fullback; full back; def; cb'
            )
        );
        DB::table('player_positions')->where('name', '=', 'Forward')->update(
            array( 
                'synonyms' => 'Forward; fw; striker; attacker; striking player; attacking player; st'
            )
        );
        DB::table('player_positions')->where('name', '=', 'Midfielder')->update(
            array( 
                'synonyms' => 'Midfielder; central midfielder; midfield; centermid; centremid; mid; cm'
            )
        );
        DB::table('player_positions')->where('name', '=', 'Goalkeeper')->update(
            array( 
                'synonyms' => 'Goalkeeper; goalie; goalee; goal keeper; keeper; goalkee'
            )
        );



        //New positionws added
        DB::table('player_positions')->insert(
            array(
                ['name' => 'Left Winger','created_at' => new DateTime,'synonyms' =>'Left Winger; lw; left wing; leftwing; lm'],
                ['name' => 'Right Winger','created_at' => new DateTime, 'synonyms' =>'Right Winger; rw; right wing; rightwing; rm'],
                ['name' => 'Wingers','created_at' => new DateTime,'synonyms' =>'Winger; wing player; wings']
                
            )
        );
    }
}
