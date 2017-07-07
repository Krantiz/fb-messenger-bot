<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('teams')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('teams')->insert(
            [
            'name' => 'Atletico de Kolkata',
            'about' => 'Atlético de Kolkata (commonly abbreviated as ATK), is an Indian Super League football franchise based in Kolkata, West Bengal. It was established on 7 May 2014 as the first ever Indian Super League team.',
            'url' => 'http://www.indiansuperleague.com/atletico-de-kolkata',
            'owner' => ' Sourav Ganguly and Sanjiv Goenka',
            'manager' => 'Antonio López Habas - López started coaching in the early 1990s, with his last club\'s reserves. After one season apiece in amateur football, also in the Madrid area, he took charge of the Bolivian national team, first as an assistant, and eventually appeared with it, as head coach, at two Copa América tournaments.',
            'brand_ambassador' => 'Kapil Dev',
            'synonyms' => 'Atletico de Kolkata, athletico, atletico, culcutta, kolkata, athletico kolkata, atletico kolkata',
            'photos' => 'http://www.indiansuperleague.com/atletico-de-kolkata/photos',
            'created_at' => new DateTime
            ]
        );
        DB::table('teams')->insert(
            [
            'name' => 'Chennaiyin FC',
            'about' => 'Chennaiyin FC is an Indian Super League football franchise based in Chennai, Tamil Nadu which began to play in October 2014 during the inaugural season of the Indian Super League.',
            'url' => 'http://www.indiansuperleague.com/chennaiyin-fc',
            'owner' => 'Abhishek Bachchan and Mahendra Singh Dhoni',
            'manager' => 'Marco Materazzi - Chennaiyin FC is an Indian Super League football franchise based in Chennai, Tamil Nadu which began to play in October 2014 during the inaugural season of the Indian Super League. They are the current reigning champions of the Indian Super League.',
            'brand_ambassador' => 'Dhanush',
            'synonyms' => 'Chennaiyin FC, chennai, madras, fc chennai, fcchennai, chennaiyin, chennia, chennai fc, cfc',
            'photos' => 'http://www.indiansuperleague.com/chennaiyin-fc/photos',
            'created_at' => new DateTime
            ]
        );
        DB::table('teams')->insert(
            [
            'name' => 'Delhi Dynamos FC',
            'about' => 'Delhi Dynamos Football Club is an Indian Super League football franchise in Delhi that began play in October 2014 during the inaugural season of the Indian Super League.',
            'url' => 'http://www.indiansuperleague.com/delhi-dynamos-fc',
            'owner' => 'DEN Networks',
            'manager' => 'Roberto Carlos - Roberto Carlos da Silva Rocha (born 10 April 1973), more commonly known simply as Roberto Carlos, is a Brazilian retired footballer. He started his career in Brazil as a forward but spent most of his career as a left-back and has been described as the "most offensive-minded left-back in the history of the game".',
            'brand_ambassador' => 'Alessandro del Piero',
            'synonyms' => 'Delhi Dynamos FC, dehli, delhi, fc delhi, delhi fc, dynamos, dynamos fc, delhi dynamos, fc dynamos, delhifc, fcdelhi, dynamosfc, fcdynamos',
            'photos' => 'http://www.indiansuperleague.com/delhi-dynamos-fc',
            'created_at' => new DateTime
            ]
        );
        DB::table('teams')->insert(
            [
            'name' => 'FC Goa',
            'about' => 'FC Goa is an Indian professional football franchise based in Goa that competes in the Indian Super League. The club was launched on 26 August 2014. The team is owned by Goan Football Club Pvt. Ltd. which consists of Venugopal Dhoot, Virat Kohli as well as Goan businessmen Dattaraj Salgaocar and Shrinivas Dempo.The legendary Brazilian Football player Arthur Antunes Coimbra (Zico) is the club\'s Manager (Head Coach). Former Brazil skipper and World Cup winner Lucio has signed up as FC \'s marquee player for the second season. The club play their home matches at the Fatorda Stadium in Goa.The team finished the league stage in second position last season',
            'url' => 'http://www.indiansuperleague.com/fc-goa',
            'owner' => 'Dattaraj Salgaocar (37% stake), Shrinivas Dempo (37% stake), Venugopal Dhoot (26% stake) and Virat Kohli',
            'mascot' => 'The logo represents Goa\'s state animal the Gaur while the colours blue and orange symbolizes the Goan coastline and sunrise.',
            'manager' => 'Zico - Arthur Antunes Coimbra, better known as Zico, is a Brazilian coach and former footballer. Often called the "White Pelé", he was a creative player, gifted with excellent technical ability and vision',
            'brand_ambassador' => 'Varun Dhawan',
            'synonyms' => 'FC Goa, goa, goa fc, fcgoa, fcg, forca goa, goan, gaur',
            'photos' => 'http://www.indiansuperleague.com/fc-goa/photos',
            'history' => 'One of the traditional powerhouse regions of Indian football, Goa was bound to be one of the cities to participate in the Hero Indian Super League from its inception. In early 2014, it was announced that the All India Football Federation, the national federation for football in India, and IMG-Reliance would be accepting bids for ownership of eight of nine selected cities for the upcoming Indian Super League, an eight-team franchise league.',
            'home_stadium' => 'FATORDA STADIUM, GOA - Fatorda Stadium in Margao, Goa, is the home ground for FC Goa. This stadium is considered to be one of the finest football stadiums in the country.',
            'fanzone_wallpapers' => 'http://www.fcgoa.in/fanzone.php',
            'slogan' => 'Forca Goa',
            'alternate_name' => 'Gaurs',
            'created_at' => new DateTime
            ]
        );
        DB::table('teams')->insert(
            [
            'name' => 'FC Pune City',
            'about' => 'FC Pune City is an Indian Super League football franchise based in Pune, Maharashtra that began play in October 2014 during the inaugural season of the Indian Super League.', 
            'url' => 'http://www.indiansuperleague.com/fc-pune-city',
            'owner' => 'ACF Fiorentina',
            'manager' => 'Antonio López Habas',
            'brand_ambassador' => 'Arjun kapoor',
            'synonyms' => 'FC Pune City, pune, pune fc, fc pune, punefc, pune city, pune city fc, fcpune',
            'photos' => 'http://www.indiansuperleague.com/fc-pune-city/photos',
            'created_at' => new DateTime
            ]
        );
        DB::table('teams')->insert(
            [
            'name' =>'Kerala Blasters FC',
            'about' => 'Kerala Blasters Football Club is an Indian professional football team based in Kerala, that competes in the Indian Super League.',
            'url' => 'http://www.indiansuperleague.com/kerala-blasters-fc',
            'owner' => ' Sachin Tendulkar, Chiranjeevi, Akkineni Nagarjuna, Allu Aravind, Nimmagadda Prasad',
            'manager' => 'Steve Coppell - Stephen James "Steve" Coppell is a former English footballer who is currently the head coach of the Kerala Blasters of the Indian Super League. As a player, he was a highly regarded right winger known for his speed and work rate.',
            'brand_ambassador' => 'Sachin Tendulkar',
            'synonyms' => 'Kerala Blasters FC, kerala, blasters, keralafc, kerala fc, blastersfc, kerala blasters, fckerala',
            'photos' => 'http://www.indiansuperleague.com/kerala-blasters-fc/photos',
            'created_at' => new DateTime
            ]
        );
        DB::table('teams')->insert(
            [
            'name' => 'Mumbai City FC',
            'about' => 'Mumbai City Football Club is an Indian Super League football franchise in Mumbai, Maharashtra, launched in August 2014 during the ISL\'s inaugural season.',
            'url' => 'http://www.indiansuperleague.com/mumbai-city-fc',
            'owner' => 'Ranbir Kapoor',
            'manager' => 'Nicolas Anelka - Nicolas Sébastien Anelka is a French footballer who is player-manager of Mumbai City FC. Prior to his retirement from international football, Anelka was also a regular member of France national team.',
            'brand_ambassador' => 'Ranbir Kapoor',
            'synonyms' => 'Mumbai City FC, mumbai, mumbai city, mumbai fc, bombay, fcmumbai, mumbaifc',
            'photos' => 'http://www.indiansuperleague.com/mumbai-city-fc/photos',
            'created_at' => new DateTime
            ]
        );
        DB::table('teams')->insert(
            [
            'name' => 'Northeast United FC',
            'about' => 'NorthEast United Football Club is an Indian Super League football franchise based in Guwahati, Assam.',
            'url' => 'http://www.indiansuperleague.com/northeast-united-fc',
            'owner' => 'John Abraham',
            'manager' => 'Sérgio Farias - The team is owned and operated by Bollywood actor John Abraham. Its manager is Brazilian Sérgio Farias and its marquee player is former Portugal international winger Simão Sabrosa.',
            'brand_ambassador' => 'John Abraham',
            'synonyms' => 'NorthEast United FC, northeast united, northeast fc, north east united, north east united fc, north east, northeast, northeastfc, fcnortheast',
            'photos' => 'http://www.indiansuperleague.com/northeast-united-fc/photos',
            'created_at' => new DateTime
            ]
        );


    }
}
