<?php

use Illuminate\Database\Seeder;

class PartnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //partners Seeder

        DB::table('partners')->delete();

        DB::table('partners')->insert(
            array([
                'name' => 'Fc Pirime Markets',
                'logo' => 'http://www.fcgoa.in/images/sponsors/fcprime.png',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'QNet',
                'logo' => 'http://www.fcgoa.in/images/sponsors/qnet.jpg',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'Dsk Dream City',
                'logo' => 'http://www.fcgoa.in/images/sponsors/dsk.jpg',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'POND\'S Men',
                'logo' => 'http://www.fcgoa.in/images/sponsors/ponds.jpg',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'Adidas',
                'logo' => 'http://www.fcgoa.in/images/sponsors/adidas.png',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'Lemos Foundation',
                'logo' => 'http://www.fcgoa.in/images/sponsors/lemo.jpg',
                'created_at' => new DateTime
                
                ],  
                [
                'name' => 'Annand Bose',
                'logo' => 'http://www.fcgoa.in/images/sponsors/bose.jpg',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'Casino Carnival',
                'logo' => 'http://www.fcgoa.in/images/sponsors/casino1.jpg',
                'created_at' => new DateTime
                
                ],
                //kolkata
                [
                'name' => 'Kolkata Games and Sports Pvt. Ltd.',
                'logo' => '',
                'created_at' => new DateTime
                
                ],
                //chennai
                [
                'name' => 'Ozone group',
                'logo' => 'http://chennaiyinfc.com/wp-content/uploads/2015/10/sponsorspage.jpg',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'TYKA',
                'logo' => 'http://chennaiyinfc.com/wp-content/uploads/2015/10/sponsorspage.jpg',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'Haier',
                'logo' => 'http://chennaiyinfc.com/wp-content/uploads/2015/10/sponsorspage.jpg',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'Uber',
                'logo' => 'http://chennaiyinfc.com/wp-content/uploads/2015/10/sponsorspage.jpg',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'Book My Show',
                'logo' => 'http://chennaiyinfc.com/wp-content/uploads/2015/10/sponsorspage.jpg',
                'created_at' => new DateTime
                
                ],
                //Delhi
                [
                'name' => 'DEN Networks',
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/a/a3/Den_logo.jpg',
                'created_at' => new DateTime
                
                ],
                //FC pune
                [
                'name' => 'ACF Fiorentina',
                'logo' => 'https://upload.wikimedia.org/wikipedia/en/thumb/b/ba/ACF_Fiorentina_2.svg/160px-ACF_Fiorentina_2.svg.png',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'Hrithik Roshan',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/Hrithik_Rado.jpg/220px-Hrithik_Rado.jpg',
                'created_at' => new DateTime
                
                ],
                //Kerala
                [
                'name' => 'Sachin Tendulkar',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/25/Sachin_Tendulkar_at_MRF_Promotion_Event.jpg/220px-Sachin_Tendulkar_at_MRF_Promotion_Event.jpg',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'Chiranjeevi',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/d/dd/Chiranjeevi_snapped_at_Mumbai_International_Airport_in_February_2016.jpg',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'Akkineni Nagarjuna',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Actor_Nagarjuna.jpg/220px-Actor_Nagarjuna.jpg',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'Allu Aravind',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1d/Allu_Aravind_at_60th_South_Filmfare_Awards_2013.jpg/220px-Allu_Aravind_at_60th_South_Filmfare_Awards_2013.jpg',
                'created_at' => new DateTime
                
                ],
                //Mumbai
                [
                'name' => 'Ranbir Kapoor',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Ranbir_promotes_YJHD.jpg/220px-Ranbir_promotes_YJHD.jpg',
                'created_at' => new DateTime
                
                ],
                //north east
                [
                'name' => 'HTC',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/HTC_logo.png/800px-HTC_logo.png',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'AirAsia',
                'logo' => 'http://neutdfc.com/wp-content/uploads/2015/05/AirAsia-Logo_red.png',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'McDowells',
                'logo' => 'http://neutdfc.com/wp-content/uploads/2015/06/MCD-Soda.png',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'Garnier',
                'logo' => 'http://neutdfc.com/wp-content/uploads/2015/06/GM-Logo_white.png',
                'created_at' => new DateTime
                
                ],
                [
                'name' => 'Red FM 93.5',
                'logo' => 'http://neutdfc.com/wp-content/uploads/2015/05/RedFmwhite-BG.png',
                'created_at' => new DateTime
                
                ]
                )
        );


        
        //Assigning team_id for all partners

        DB::table('partners')->where('name', '=', 'Fc Pirime Markets')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'QNet')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'Dsk Dream City')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'Adidas')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'Lemos Foundation')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );

        DB::table('partners')->where('name', '=', 'POND\'S Men')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'Annand Bose')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'Casino Carnival')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        //kolkata
        DB::table('partners')->where('name', '=', 'Kolkata Games and Sports Pvt. Ltd.')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Atletico de Kolkata')->first()->id
            )
        );
        //chennai
        DB::table('partners')->where('name', '=', 'Book My Show')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Chennaiyin FC')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'Ozone group')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Chennaiyin FC')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'TYKA')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Chennaiyin FC')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'Haier')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Chennaiyin FC')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'Uber')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Chennaiyin FC')->first()->id
            )
        );
        //Delhi
        DB::table('partners')->where('name', '=', 'DEN Networks')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Delhi Dynamos FC')->first()->id
            )
        );
        //pune
        DB::table('partners')->where('name', '=', 'ACF Fiorentina')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'FC Pune City')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'Hrithik Roshan')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'FC Pune City')->first()->id
            )
        );
        //kerala
        DB::table('partners')->where('name', '=', 'Sachin Tendulkar')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Kerala Blasters FC')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'Chiranjeevi')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Kerala Blasters FC')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'Akkineni Nagarjuna')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Kerala Blasters FC')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'Allu Aravind')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Kerala Blasters FC')->first()->id
            )
        );
        //Mumbai
        DB::table('partners')->where('name', '=', 'Ranbir Kapoor')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Mumbai City FC')->first()->id
            )
        );
        //North east
        DB::table('partners')->where('name', '=', 'HTC')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Northeast United FC')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'AirAsia')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Northeast United FC')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'McDowells')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Northeast United FC')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'Garnier')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Northeast United FC')->first()->id
            )
        );
        DB::table('partners')->where('name', '=', 'Red FM 93.5')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'Northeast United FC')->first()->id
            )
        );
    }
}
