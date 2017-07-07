<?php

use Illuminate\Database\Seeder;

class PlayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('players')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            //Atletico de Kolkata
        DB::table('players')->insert(
            array([
                'name' => 'AMRINDER SINGH',
                'about' => 'A product of the Punjab government-run Sports Wing Academy, this Mahilpur lad started as a striker before his first coach Yarvinder Singh, seeing his impressive build, decided to push him to goalkeeping, something that proved a turning point in his career. ',
                'url' => 'http://www.indiansuperleague.com/atletico-de-kolkata/squad/goalkeeper-3997-amrinder-singh-playerprofile',
               
                'player_picture' => 'http://images.indiansuperleague.com/images/team-micro/squad-widget/3997.png'
                ],
            	[
                'name' => 'JUAN JESUS CALATAYUD SÁNCHEZ',
                'about' => 'Juan Jesús Calatayud Sánchez came through the youth ranks at Malaga CF. After spending the initial phase of his career with Malaga B team and lower division Spanish teams, Juan Calatayud broke into the senior team and made 36 La Liga appearances between 2003-05.',
                'url' => 'http://www.indiansuperleague.com/atletico-de-kolkata/squad/goalkeeper-19122-juan-jesus-calatayud-sanchez-playerprofile',
                
                'player_picture' => 'http://images.indiansuperleague.com/images/team-micro/squad-widget/19122.png'
                ])
        );

        //Chennaiyin FC
        DB::table('players')->insert(
           array([
                'name' => 'APOULA EDIMA EDEL BETE',
                'about' => 'The Cameroon-born goalkeeper joined Pyunik Yerevan, Armenia’s most successful club as a 16-year-old. He won the league in each of his three-and-a-half seasons there, before moving to Europe, first to Rapid Bucharest and then to French giants Paris Saint-Germain. ',
                'url' => 'http://www.indiansuperleague.com/chennaiyin-fc/squad/goalkeeper-6582-apoula-edima-edel-bete-playerprofile',
               
                'player_picture' => 'http://images.indiansuperleague.com/images/team-micro/squad-widget/6582.png'
                ],
           		[
                'name' => 'KARANJIT SINGH',
                'about' => 'Former national coach Sukhwinder Singh spotted Karanjit when he was just 15. JCT signed him in 2004 and he spent six seasons there. Karanjit eventually found his way to Salgaocar and helped the club to an I-League triumph in the 2010-11 season.',
                'url' => 'http://www.indiansuperleague.com/chennaiyin-fc/squad/goalkeeper-13366-karanjit-singh-playerprofile',
                
                'player_picture' => 'http://images.indiansuperleague.com/images/team-micro/squad-widget/13366.png'
                ])
        );

        //Delhi Dynamos FC
        DB::table('players')->insert(
            array([
                'name' => 'ROBERTO CARLOS',
                'about' => 'Probably one of the best left backs in the history of the beautiful game, Roberto Carlos is known for his trademark free kicks and overlapping runs. The Carlos story began with stints at Sao Jao, Atletico Mineiro and Palmeiras in Brazil. As a 19 year old his prodigious talent was acknowledged by his call up to the Brazil Senior side.',
                'url' => 'http://www.indiansuperleague.com/delhi-dynamos-fc/squad/defender-21023-roberto-carlos-playerprofile',
                
                'player_picture' => 'http://images.indiansuperleague.com/images/team-micro/squad-widget/21023.png'
                ],
            	[
                'name' => 'ANTONIO DOBLAS SANTANA',
                'about' => 'Alessandro Del Piero Ufficiale OMRI is an Italian former professional footballer who played as a deep-lying forward. In 2015, he worked as a pundit for Sky Sport Italia.',
                'url' => 'http://www.indiansuperleague.com/delhi-dynamos-fc/squad/goalkeeper-15787-antonio-doblas-santana-playerprofile',
                
                'player_picture' => 'http://images.indiansuperleague.com/images/team-micro/squad-widget/15787.png'
                ])
        );


         //FC Goa
        DB::table('players')->insert(
            array(
                //Defenders
                [
                'name' => 'Lucimar Ferreira da Silva',
                'about' => 'For a marquee player, Lucio has a decorated resume having played for the likes of Bayern Munich, Juventus, Inter Milan and the Brazil national team.The centre-back\'s major honours include the World Cup in 2002 and the Confederations Cup in 2005 and 2009 with his country. In his senior career, the Brazilian won the Bundesliga, the Champions League as well as the Serie A.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/defender-19165-lucio-playerprofile',
                
                'player_picture' => 'http://www.fcgoa.in/images/team/defenders/lucio.png',
                'place_of_birth' => 'Planaltina, DF, Brazil',
                'dob' => '8 May 1978 (age 37)',
                'jersey_number' => '3',
                'height' => '1.88 m (6 ft 2 in)',
                'facebook_link' => 'https://www.facebook.com/l3lucio?fref=ts',
                'twitter_link' => 'https://twitter.com/Lucio_L3',
                'instagram_link' => 'https://www.instagram.com/luciobr03/',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Luciano Sobrosa',
                'about' => 'Signed to fill the additional player quota among the foreign recruits, Sobrosa made his mark in the I-League over the last few seasons starting with a stint with Sporting Clube de Goa in 2007-08 season.The rugged centre-back won the I-League title with Salgaocar FC in the 2010-11 season alongside winning the now defunct Federation Cup before joining Mohammedan Sporting where he won the Durand Cup and the IFA Shield and played for Pune FC this last season.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/defender-21033-luciano-sobrosa-playerprofile',
                
                'player_picture' => 'http://www.fcgoa.in/images/team/defenders/luciano.png',
                'place_of_birth' => 'Brazil',
                'dob' => '25 Jul 1979 (age 36)',
                'jersey_number' => '4',
                'height' => '186 m (6 ft 1 in)',
                'facebook_link' => '',
                'twitter_link' => '',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Gregory Arnolin',
                'about' => 'A product of the PSG youth academy, the Frenchman has returned to FC Goa after spending a season with Atletico Clube de Portugal as the only foreigner to be retained by FC Goa into the ISL season 2.For a centre-back, Gregory scored FC Goa\'s first two goals in the inaugural edition of the ISL. He is known to find the back of the net 11 times in 53 games for Gil Vicente FC, another Portuguese Club and has previously made a significant impact with Sporting Gijon in Spain.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/defender-10752-gregory-arnolin-playerprofile',
                
                'player_picture' => 'http://www.fcgoa.in/images/team/defenders/gregory.png',
                'place_of_birth' => 'Livry-Gargan, France',
                'dob' => '10 November 1980 (age 34)',
                'jersey_number' => '15',
                'height' => '1.87 m (6 ft 2 in)',
                'facebook_link' => 'https://www.facebook.com/Gregory-Goyo-Arnolin-137261589778/timeline',
                'twitter_link' => 'https://twitter.com/GregoryArn15',
                'instagram_link' => 'https://www.instagram.com/GregoryArn15/',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Debabrata roy',
                'about' => 'The right back, who played almost every match for FC Goa last season, got his career to a head start playing in the Subroto Cup and the under-16 league in West Bengal.Passing out from the Tata Football Academy, he spent three years with East Bengal sandwiched between two spells with Mahindra United and is on-loan from Dempo SC.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/defender-10250-debabrata-roy-playerprofile',
                
                'player_picture' => 'http://www.fcgoa.in/images/team/defenders/debabrata.png',
                'place_of_birth' => 'Kolkata, West Bengal, India',
                'dob' => 'November 4, 1986 (age 28)',
                'jersey_number' => '2',
                'height' => '1.73 m (5 ft 8 in)',
                'facebook_link' => '',
                'twitter_link' => '',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Keenan almeida',
                'about' => 'The 24-year-old was part of India\'s Under-23 squad for the 2014 Asian Games while featuring for Sporting Clube de Goa in the I-League between 2012 and 2015.The former Salgaocar FC player is set to experience the Indian Super League (ISL) for the first time in his career.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/defender-21028-keenan-almeida-playerprofile',
               
                'player_picture' => 'http://www.fcgoa.in/images/team/defenders/keenan.png',
                'place_of_birth' => 'Margao, Goa, India',
                'dob' => '10 December 1991 (age 23)',
                'jersey_number' => '23',
                'height' => '1.73 m (5 ft 8 in)',
                'facebook_link' => '',
                'twitter_link' => '',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Nicolau Colaco',
                'about' => 'The Goan right back has represented Salgaocar FC from 2009, winning the I-League title in his first season and the Federation Cup in the following season.The 31-year-old was selected into the 37-man squad for the India national football team that would play in the 2012 Nehru Cup.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/defender-21029-nicolau-colaco-playerprofile',
                
                'player_picture' => 'http://www.fcgoa.in/images/team/defenders/nicolau.png',
                'place_of_birth' => 'Goa, India',
                'dob' => '16 May 1984 (age 31)',
                'jersey_number' => '16',
                'height' => '1.80 m (5 ft 11 in)',
                'facebook_link' => '',
                'twitter_link' => '',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Narayan Das',
                'about' => 'The left wingback, 21, is a Tata Football Academy (TFA) alumnus who played a season with Pailan Arrows before joining Dempo SC in 2013.On-loan with FC Goa for the second consecutive season of the ISL, Das has represented India at the U-19 and U-22 levels in 2012 and made his India senior team debut in the very next year.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/defender-10256-narayan-das-playerprofile',
                
                'player_picture' => 'http://www.fcgoa.in/images/team/defenders/narayan.png',
                'place_of_birth' => '25 September 1993 (age 21)',
                'dob' => '25 September 1993 (age 21)',
                'jersey_number' => '5',
                'height' => '1.78 m (5 ft 10 in)',
                'facebook_link' => '',
                'twitter_link' => '',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                //Midfielders
                [
                'name' => 'Romeo Fernandes',
                'about' => 'The right winger was scouted into Dempo\'s youth teams. Although Fernandes made his senior team debut with Dempo in the 2011–12 I-League season, in the same season he made 8 appearances, scoring 7 times during the 2012 I-League U-20.Fernandes grew as the fans\' favourite at FC Goa in the ISL season 1. He then became the first Indian to play in South America professionally at a senior level with Brazilian club Atletico on-loan from parent club Dempo before returning back to FC Goa.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/midfielder-10626-romeo-fernandes-playerprofile',
               
                'player_picture' => 'http://www.fcgoa.in/images/team/midfielders/romeo.png',
                'place_of_birth' => 'Assolna, Goa, India',
                'dob' => '6 July 1992 (age 23)',
                'jersey_number' => '19',
                'height' => '1.68 m (5 ft6 in)',
                'facebook_link' => '',
                'twitter_link' => '',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Leonardo da Silva Moura',
                'about' => 'One of the few players who represented all four of the big Rio de Janeiro teams, namely Botafogo, Vasco, Fluminense, and Flamengo, Moura may be employed as a right back or a midfielder.The 36-year-old has played a mere four years outside his country in his 13-year senior career.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/midfielder-21031-leonardo-da-silva-moura-playerprofile',
               
                'player_picture' => 'http://www.fcgoa.in/images/team/defenders/leo.png',
                'place_of_birth' => 'Niteroi, Brazil',
                'dob' => 'October 23, 1978 (age 36)',
                'jersey_number' => '10',
                'height' => '1.76 m (5 ft 9 1/2 in)',
                'facebook_link' => 'https://www.facebook.com/LeoMoura2?fref=ts',
                'twitter_link' => 'https://twitter.com/leomoura2',
                'instagram_link' => 'https://www.instagram.com/leomoura23/',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Jonatan Lucca',
                'about' => 'Lucca is a former AS Roma U-21 midfielder, who moved back to Atletico Paranaense and was rumoured to have been pried by several European sides after impressing in Roma and Internacional\'s youth sides.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/midfielder-21032-jonatan-lucca-playerprofile',
               
                'player_picture' => 'http://www.fcgoa.in/images/team/midfielders/jonatan.png',
                'place_of_birth' => 'Brazil',
                'dob' => ' 02 Jun 1994 (age 21)',
                'jersey_number' => '47',
                'height' => '',
                'facebook_link' => '',
                'twitter_link' => 'https://twitter.com/Jonatanlucca',
                'instagram_link' => 'https://www.instagram.com/Jonatanlucca/',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Joffre Mateu González',
                'about' => 'The Spaniard, who won the inaugural edition of the ISL with Atletico de Kolkata in 2014, is a FC Barcelona youth product and made his La Masia debut in the final game of the 1997-98 season.Joffre helped Levante UD attain promotion to the La Liga in 2004 and won the Copa Del Rey trophy with Espanyol. He was the first-choice with Real Valladolid and Girona FC before traveling to India.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/midfielder-4805-joffre-mateu-gonzalez-playerprofile',
                
                'player_picture' => 'http://www.fcgoa.in/images/team/midfielders/jofre.png',
                'place_of_birth' => 'Alpicat, Spain',
                'dob' => '24 January 1980 (age 35)',
                'jersey_number' => '22',
                'height' => '1.71 m (5 ft 7 1/2 in)',
                'facebook_link' => 'https://www.facebook.com/pages/Jofre/105629282803063?fref=ts',
                'twitter_link' => 'https://twitter.com/JofreM11',
                'instagram_link' => 'https://www.instagram.com/jofrem11/',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Mandar Rao Dessai',
                'about' => 'Growing from Dempo Sports Club\'s youth set-up and learning his trade at local club Clube Atletico de Parra, Dessai broke into Dempo\'s senior team in 2013 and in the subsequent year at FC Goa.The 23-year-old captained the gold medallist Goa-India team in the 2014 Lusophonia Games where he made 4 appearances and scored once. He made his India U23 debut in the 2014 Asian Games against UAE U23.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/midfielder-10255-mandar-rao-dessai-playerprofile',
                
                'player_picture' => 'http://www.fcgoa.in/images/team/midfielders/mandar.png',
                'place_of_birth' => 'Mapusa, Goa, India',
                'dob' => '18 March 1992 (age 23)',
                'jersey_number' => '17',
                'height' => '1.71 m (5 ft 7 1⁄2 in)',
                'facebook_link' => '',
                'twitter_link' => '',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Denson Devadas',
                'about' => 'The attacking midfielder, who can also play in a central role, spent the first three years of his senior career with Viva Kerala.In 2007, Devadas helped United Sports Club to qualify for the I-League and joined Mohun Bagan in 2012 with whom he won the I-League title last season and turned out for Chennaiyin FC in the ISL in 2014.',
                'url' => 'http://www.indiansuperleague.com/chennaiyin-fc/squad/midfielder-10699-denson-devadas-playerprofile',
              
                'player_picture' => 'http://www.fcgoa.in/images/team/midfielders/denson.png',
                'place_of_birth' => 'Kerala, India',
                'dob' => '20 December 1982 (age 32)',
                'jersey_number' => '13',
                'height' => '1.76 m (5 ft 9 1⁄2 in)',
                'facebook_link' => '',
                'twitter_link' => '',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Bikramjit Singh',
                'about' => 'After playing for Pailan Arrows in the I-League, Singh spent two years with Churchill Brothers SC and was part of the I-League and Federation Cup winning campaign..He won the 2014-15 I-League title with Mohun Bagan and has been retained by FC Goa for the ISL season 2 after proving to be an asset as a defensive midfielder.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/midfielder-16188-bikramjit-singh-playerprofile',
               
                'player_picture' => 'http://www.fcgoa.in/images/team/midfielders/bikramjit.png',
                'place_of_birth' => 'Punjab, India',
                'dob' => 'October 15, 1992 (age 22)',
                'jersey_number' => '8',
                'height' => '1.71 m (5 ft 7 1⁄2 in)',
                'facebook_link' => 'https://www.facebook.com/Bikramjit.Singh.06',
                'twitter_link' => 'https://twitter.com/BikramFootball',
                'instagram_link' => 'https://www.instagram.com/bikram008/',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Pronay Halder',
                'about' => 'Graduated from Tata Football Academy (TFA) in 2010, Halder joined Dempo SC in 2013 after spending two season with Pailan Arrows and has been retained by FC Goa into the second season of the ISL.At national level, the 22-year-old has played for India U-19, was the part of India U-22 team for 2013 AFC U-22 Asian Cup qualification and represented India under-23 at Asian Games 2014. He made his senior team debut earlier this year.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/midfielder-10625-pronay-halder-playerprofile',
                
                'player_picture' => 'http://www.fcgoa.in/images/team/midfielders/pronay.png',
                'place_of_birth' => 'Barrackpore, West Bengal, India',
                'dob' => 'February 25, 1993 (age 22)',
                'jersey_number' => '18',
                'height' => '1.80 m (5 ft 11 in)',
                'facebook_link' => '',
                'twitter_link' => '',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                //Forwards
                [
                'name' => 'MacPherlin Dudu Omagbemi',
                'about' => 'Dudu is one of the most prolific strikers in the I-League, proving his worth for his previous clubs on numerous occasions. Dudu started his career in India in 2001. He joined Sporting Clube de Goa in 2001, playing in the National Football League. He played with them for eight seasons, becoming the league\'s top goalscorer. He scored 73 goals in 89 appearances for the club.The charismatic football player rejected an Olympic call-up in 2008, and joined three-time Hungarian champion Debreceni VSC later that year. After playing for clubs in Hungary and Finland, Dudu signed for I-League side East Bengal this August.Dudu is renowned for his attacking game and amazing fitness.',
                'url' => 'http://www.indiansuperleague.com/fc-pune-city/squad/forward-15938-macpherlin-dudu-omagbemi-playerprofile',
               
                'player_picture' => 'http://www.fcgoa.in/images/team/blank.png',
                'place_of_birth' => 'Lagos, Nigeria',
                'dob' => 'July 18, 1985 (age 30)',
                'jersey_number' => '25',
                'height' => '1.74 m (5 ft 7 in)',
                'facebook_link' => '',
                'twitter_link' => '',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Reinaldo da Cruz Oliveira',
                'about' => 'The 36-year-old striker has spent four years with Paris Saint-Germain and boasts of experience of playing in countries like Japan, South Korea, Saudi Arebia, Brazil, Italy and France.Before confirming the signing of Reinaldo from the open market, Zico wanted to include the player in a Brazilian attacking duo with Adriano.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/forward-19166-reinaldo-da-cruz-oliveira-playerprofile',
                
                'player_picture' => 'http://www.fcgoa.in/images/team/forwards/reinaldo.png',
                'place_of_birth' => 'Itaguaí, Brazil',
                'dob' => 'March 14, 1979 (age 36)',
                'jersey_number' => '11',
                'height' => ' 1.87 m (6 ft 1 1/2 in)',
                'facebook_link' => 'https://www.facebook.com/pages/Reinaldo-da-Cruz-Oliveira/108141975873018?fref=ts',
                'twitter_link' => '',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Rafael Coelho Luiz',
                'about' => '',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/forward-21224-rafael-coelho-luiz-playerprofile',
                
                'player_picture' => 'http://www.fcgoa.in/images/team/blank.png',
                'place_of_birth' => 'Florianópolis, Santa Catarina, Brazil',
                'dob' => ' 20 May 1988 (age 27)',
                'jersey_number' => '20',
                'height' => '5 ft 07 in (1.74 m)',
                'facebook_link' => '',
                'twitter_link' => '',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Thongkhosiem Haokip',
                'about' => 'The Manipuri lad grew into the ranks of the Pune FC senior team from the club\'s academy. He has made 36 first team appearances in the I-League, scoring 11 goals in all and has also made three appearances for the Indian Under-23 side.Haokip, who was drafted to play for FC Goa in the ISL season 2, was the I-League\'s highest Indian goal scorer last season with 7 goals including a memorable hat-trick against Shillong Lajong FC.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/forward-3985-thongkhosiem-haokip-playerprofile',
                
                'player_picture' => 'http://www.fcgoa.in/images/team/forwards/haokip.png',
                'place_of_birth' => 'Gangpijang, Manipur, India',
                'dob' => '13 March 1993 (age 22)',
                'jersey_number' => '25',
                'height' => '1.74 m (5 ft 7 in)',
                'facebook_link' => '',
                'twitter_link' => '',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Chinadorai Sathyan Sabeeth',
                'about' => 'Inspired by his father into playing the sport, Sabeeth started his youth career with Nilagiri Police team and was roped in for the Pailan Arrows Project from Viva Kerala.The India international scored once in 8 appearances for Kerala Blasters FC on-loan from Mohun Bagan and is on-loan to FC Goa from East Bengal this term.',
                'url' => 'https://en.wikipedia.org/wiki/Chinadorai_Sabeeth',
                
                'player_picture' => 'http://www.fcgoa.in/images/team/forwards/sabeeth.png',
                'place_of_birth' => 'Tamil Nadu, India',
                'dob' => '2 December 1990 (age 24)',
                'jersey_number' => '30',
                'height' => ' 1.78 m (5 ft 10 in)',
                'facebook_link' => '',
                'twitter_link' => '',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Joaquim Santan Abranches',
                'about' => 'The India striker cum winger plied his youth career with Salcete FC, Churchill Brothers SC and was only 19 years old when he signed for Dempo SC with whom he began his senior career and won two I-League titles.Abranches earned a call up to the India U-23 team after a brilliant 2009-10 I-League season with Dempo and has been with the country\'s senior team from 2011. Currently with East Bengal, he played for FC Pune City in the ISL in 2014.',
                'url' => 'https://en.wikipedia.org/wiki/Joaquim_Abranches',
                
                'player_picture' => 'http://www.fcgoa.in/images/team/forwards/joaquim.png',
                'place_of_birth' => 'Verna, Goa, India',
                'dob' => '28 October 1985 (age 29)',
                'jersey_number' => '71',
                'height' => '1.73 m (5 ft 8 in)',
                'facebook_link' => '',
                'twitter_link' => '',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Victorino Fernadnes',
                'about' => 'Although he started his youth career at the age of 17 where he played for Salgaocar FC for four years, he was recognised at Sporting Clube de Goa with whom he started his senior club career.The 26-year-old helped Sporting Goa gain promotion into the I-League 2011-12 season and helped them to qualify for the Federation Cup semi-finals in the 2014-15 season which included a hat-trick against East Bengal.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/forward-19164-victorino-fernandes-playerprofile',
               
                'player_picture' => 'http://www.fcgoa.in/images/team/forwards/victorino.png',
                'place_of_birth' => 'Goa, India',
                'dob' => '3 February 1989 (age 26)',
                'jersey_number' => '14',
                'height' => '1.70 m (5 ft 7 in)',
                'facebook_link' => 'https://www.facebook.com/victorino.fernandes2?fref=ts',
                'twitter_link' => 'https://twitter.com/victorinoferna4',
                'instagram_link' => 'https://www.instagram.com/@victorinofds14',
                'created_at' => new DateTime
                ],
                //GoalKeepers
                [
                'name' => 'Elinton Sanchotene Andrade',
                'about' => 'The Brazilian-born Portuguese goalkeeper won the FIFA Beach Soccer World Cup that which was hosted by Portugal in July 2015, making 67 stops in six matches in the competition.Andrade has played for Brazilian powerhouses Flamengo, Fluminense and Vasco da Gama and has been a part of the Olympique de Marseille squad during his time in Europe.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/goalkeeper-19163-elinton-sanchotene-andrade-playerprofile',
             
                'player_picture' => 'http://www.fcgoa.in/images/team/goalkeepers/elinton.png',
                'place_of_birth' => 'Santa Maria, Brazil',
                'dob' => 'March 30, 1979 (age 36)',
                'jersey_number' => '99',
                'height' => '1.90 m (6 ft 3 in)',
                'facebook_link' => 'https://www.facebook.com/ElintonSAndrade?fref=ts',
                'twitter_link' => 'https://twitter.com/EAndrade16',
                'instagram_link' => 'https://www.instagram.com/elintonandrade/',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Laxmikant Kattimani',
                'about' => 'The Dempo SC shot-stopper started his senior career at Vasco SC in 2008 and soon rose to prominence with the Golden Eagles in the next season.Kattimani represented India at the AFC under-19 Asian Cup qualifiers as well as at the 2012 Olympic qualifiers at Doha. He was the reserve goalkeeper in the India under-23 team that won the SAFF Cup in 2009 and won three I-League titles with Dempo.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/goalkeeper-10254-laxmikant-kattimani-playerprofile',
               
                'player_picture' => 'http://www.fcgoa.in/images/team/goalkeepers/laxmikant.png',
                'place_of_birth' => 'Cansaulim, Goa, India',
                'dob' => 'May 3, 1989 (age 26)',
                'jersey_number' => '27',
                'height' => '1.83 m (6 ft 0 in)',
                'facebook_link' => '',
                'twitter_link' => 'https://twitter.com/kattimani123',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                [
                'name' => 'Luis Xavier Barreto',
                'about' => 'The veteran goalkeeper was at his peak while playing for Sporting Clube de Goa and revived his career with loan spells to Mohammedan Sporting and Mumbai FC while at Dempo SC and later joined East Bengal.Barreto, 34, represented Kerala Blasters FC in the Indian Super League (ISL) in 2014 and will don FC Goa\'s colours in the ISL season 2.',
                'url' => 'http://www.indiansuperleague.com/fc-goa/squad/goalkeeper-10633-luis-xavier-barreto-playerprofile',
               
                'player_picture' => 'http://www.fcgoa.in/images/team/goalkeepers/barreto.png',
                'place_of_birth' => 'Nuvem, Goa, India',
                'dob' => '14 October 1980 (age 34)',
                'jersey_number' => '1',
                'height' => '1.73 m (5 ft 8 in)',
                'facebook_link' => '',
                'twitter_link' => '',
                'instagram_link' => '',
                'created_at' => new DateTime
                ],
                //Coach
                [
                'name' => 'Arthur Antunes Coimbra',
                'about' => 'Zico represented Brazil in the World Cup of Masters, scoring in the final of the 1990 and 1991 editions.Indian Super League side FC Goa signed Zico as their coach for the debut season in 2014. Though Goa had a slow start to the season, they ultimately qualified for the semifinals with a game in hand by defeating Chennaiyin FC.',
                'url' => 'http://www.fcgoa.in/coach.php',
                
                'player_picture' => 'http://www.fcgoa.in/images/team/zico.png',
                'place_of_birth' => 'Rio de Janeiro, Brazil',
                'dob' => 'March 3, 1953 (age 62)',
                'jersey_number' => '',
                'height' => '1.72 m (5 ft 7 1⁄2 in)',
                'facebook_link' => 'https://www.facebook.com/ZicoOficial?fref=ts',
                'twitter_link' => 'https://twitter.com/ziconarede',
                'instagram_link' => '',
                'created_at' => new DateTime
                ]
                )
        );


        //FC Pune City
        DB::table('players')->insert(
            array([
                'name' => 'BIKASH JAIRU',
                'about' => 'Another talent scouted by the “ Search for more Bhaichungs” scheme launched by the Govt. , Jairu was initially inducted into the Sports Hostel in Namchi before moving to ONGC FC who offered him a contract in 2008. After the stint with ONGC, he moved back Shillong, to join Rangdajied United FC.',
                'url' => 'http://www.indiansuperleague.com/fc-pune-city/squad/midfielder-19135-bikash-jairu-playerprofile',
               
                'player_picture' => 'http://images.indiansuperleague.com/images/team-micro/squad-widget/19135.png'
                ],
            	[
                'name' => 'DIDIER ZOKORA',
                'about' => 'After starting his career with an Ivorian club Mimosas, he moved to Belgium and Zokora played over 100 matches for Belgian club Racing Genk, including a 1-1 draw against Real Madrid in the Champions League 2002-03.',
                'url' => 'http://www.indiansuperleague.com/fc-pune-city/squad/midfielder-1498-didier-zokora-playerprofile',
               
                'player_picture' => 'http://images.indiansuperleague.com/images/team-micro/squad-widget/1498.png'
                ])
        );

        //Kerala Blasters FC
        DB::table('players')->insert(
            array([
                'name' => 'SANDIP NANDY',
                'about' => 'Goalkeepers often have a long shelf life and the 40-year-old gloveman from West Bengal best exemplifies this maxim in the Indian context. Sandip Nandy’s debut in big time football with Mohun Bagan in 1999 was a winning one with the boatmen winning the NFL.',
                'url' => 'http://www.indiansuperleague.com/kerala-blasters-fc/squad/goalkeeper-10639-sandip-nandy-playerprofile',
               
                'player_picture' => 'http://images.indiansuperleague.com/images/team-micro/squad-widget/10639.png'
                ],
            	[
                'name' => 'CHRIS DAGNALL',
                'about' => 'The Liverpool born striker started his career at the age of 13 with Tranmere Rovers and scored his first goal for the club in a loss to Luton Town. It was a sign of many more goals to come as the forward would go onto score 112 goals in 414 club appearances for clubs such as Rochdale, Scunthorpe, Barnsley, Bradford City, Leyton Orient etc.',
                'url' => 'http://www.indiansuperleague.com/kerala-blasters-fc/squad/forward-18803-chris-dagnall-playerprofile',
               
                'player_picture' => 'http://images.indiansuperleague.com/images/team-micro/squad-widget/18803.png'
                ])
        );

        //Mumbai City FC
        DB::table('players')->insert(
            array([
                'name' => 'Subrata Paul',
                'about' => 'Subrata Pal is an Indian professional footballer who currently plays for Indian Super League side NorthEast United, on loan from DSK Shivajians in the I-League.',
                'url' => 'http://www.indiansuperleague.com/mumbai-city-fc/squad/goalkeeper-10767-subrata-paul-playerprofile',
                
                'player_picture' => 'http://images.indiansuperleague.com/images/team-micro/squad-widget/10767.png'
                ],
            	[
                'name' => 'JUAN AGUILERA NUNEZ',
                'about' => 'A native of Madrid, Spain, Juan Aguilera Nunez learned his craft with the reserve team of Getafe FC followed by a spell at CDA Navalcamero. Subsequently, he spent 3 years in the Spanish third tier side CD Leganes.',
                'url' => 'http://www.indiansuperleague.com/mumbai-city-fc/squad/midfielder-19149-juan-aguilera-nunez-playerprofile',
                
                'player_picture' => 'http://images.indiansuperleague.com/images/team-micro/squad-widget/19149.png'
                ])
        );

        //Northeast United FC
        DB::table('players')->insert(
            array([
                'name' => 'GENNARO BRACIGLIANO',
                'about' => 'Rising through the youth ranks at AS Nancy, Bracigliano made a memorable first-team debut as an 18-year-old, keeping a clean sheet against giants PSG. ',
                'url' => 'http://www.indiansuperleague.com/northeast-united-fc/squad/goalkeeper-10675-gennaro-bracigliano-playerprofile',
               
                'player_picture' => 'http://images.indiansuperleague.com/images/team-micro/squad-widget/10675.png'
                ],
            	[
                'name' => 'LALTHUAMMAWIA RALTE',
                'about' => 'Lalthuammawia Ralte began his career with Shillong Lajong and has come a long way from his humble beginnings in Mizoram to become the first pick in the 2015 Hero Indian Super League Draft for North East United FC.',
                'url' => 'http://www.indiansuperleague.com/northeast-united-fc/squad/goalkeeper-19126-lalthuammawia-ralte-playerprofile',
                
                'player_picture' => 'http://images.indiansuperleague.com/images/team-micro/squad-widget/19126.png'
                ])
        );






        //Players Synonyms added

        DB::table('players')->where('name', '=', 'Lucimar Ferreira da Silva')->update(
            array( 
                'synonyms' => 'Lucimar Ferreira da Silva; Lucimar; Ferreira da Silva; Lucimar Ferreira; Lucimar da Silva'
            )
        );
        DB::table('players')->where('name', '=', 'Luciano Sobrosa')->update(
            array( 
                'synonyms' => 'Luciano Sobrosa; Luciano; Sobrosa; Sobrosa Luciano'
            )
        );
        DB::table('players')->where('name', '=', 'Gregory Arnolin')->update(
            array( 
                'synonyms' => 'Gregory Arnolin; Gregory; Arnolin; Arnolin Gregory'
            )
        );
        DB::table('players')->where('name', '=', 'Debabrata roy')->update(
            array( 
                'synonyms' => 'Debabrata roy; Debabrata; roy; roy Debabrata'
            )
        );
        DB::table('players')->where('name', '=', 'Keenan almeida')->update(
            array( 
                'synonyms' => 'Keenan almeida; Keenan; almeida;almeida Keenan'
            )
        );
        DB::table('players')->where('name', '=', 'Nicolau Colaco')->update(
            array( 
                'synonyms' => 'Nicolau Colaco; Nicolau; Colaco; Colaco Nicolau'
            )
        );
        DB::table('players')->where('name', '=', 'Narayan Das')->update(
            array( 
                'synonyms' => 'Narayan Das; Narayan; Das; Das Narayan'
            )
        );
        DB::table('players')->where('name', '=', 'Romeo Fernandes')->update(
            array( 
                'synonyms' => 'Romeo Fernandes; Romeo; Fernandes; Fernandes Romeo'
            )
        );
        DB::table('players')->where('name', '=', 'Leonardo da Silva Moura')->update(
            array( 
                'synonyms' => 'Leonardo da Silva Moura; Leonardo; da Silva Moura; Leonardo Moura; Moura da Silva; da Silva Leonardo'
            )
        );
        DB::table('players')->where('name', '=', 'Jonatan Lucca')->update(
            array( 
                'synonyms' => 'Jonatan Lucca; Jonatan; Lucca; Lucca Jonatan'
            )
        );
        DB::table('players')->where('name', '=', 'Joffre Mateu González')->update(
            array( 
                'synonyms' => 'Joffre Mateu González; Joffre; Mateu; González; Joffre Mateu; Mateu González;J offre González'
            )
        );
        DB::table('players')->where('name', '=', 'Mandar Rao Dessai')->update(
            array( 
                'synonyms' => 'Mandar Rao Dessai; Mandar Rao; Dessai Mandar Rao;Mandar Dessai'
            )
        );
        DB::table('players')->where('name', '=', 'Denson Devadas')->update(
            array( 
                'synonyms' => 'Denson Devadas; Denson; Devadas; Devadas Denson'
            )
        );
        DB::table('players')->where('name', '=', 'Bikramjit Singh')->update(
            array( 
                'synonyms' => 'Bikramjit Singh; Singh Bikramjit; Bikramjit'
            )
        );
        DB::table('players')->where('name', '=', 'Pronay Halder')->update(
            array( 
                'synonyms' => 'Pronay Halder; Pronay; Halder; Halder Pronay'
            )
        );
        DB::table('players')->where('name', '=', 'MacPherlin Dudu Omagbemi')->update(
            array( 
                'synonyms' => 'MacPherlin Dudu Omagbemi; MacPherlin; Dudu Omagbemi; Dudu Omagbemi MacPherlin; MacPherlin'
            )
        );
        DB::table('players')->where('name', '=', 'Reinaldo da Cruz Oliveira')->update(
            array( 
                'synonyms' => 'Reinaldo da Cruz Oliveira; Reinaldo; da Cruz Oliveira; Oliveira Reinaldo da Cruz; Reinaldo da Cruz'
            )
        );
        DB::table('players')->where('name', '=', 'Rafael Coelho Luiz')->update(
            array( 
                'synonyms' => 'Rafael Coelho Luiz; Rafael; Coelho Luiz; Coelho Luiz Rafael; Rafael Luiz Coelho;Rafael Coelho'
            )
        );
        DB::table('players')->where('name', '=', 'Thongkhosiem Haokip')->update(
            array( 
                'synonyms' => 'Thongkhosiem Haokip; Thongkhosiem; Haokip; Haokip Thongkhosiem'
            )
        );
        DB::table('players')->where('name', '=', 'Chinadorai Sathyan Sabeeth')->update(
            array( 
                'synonyms' => 'Chinadorai Sathyan Sabeeth; Chinadorai; Sathyan Sabeeth; Sathyan Sabeeth Chinadorai;Sabeeth Chinadorai Sathyan; Chinadorai Sabeeth'
            )
        );
        DB::table('players')->where('name', '=', 'Joaquim Santan Abranches')->update(
            array( 
                'synonyms' => 'Joaquim Santan Abranches; Joaquim; Santan Abranches; Santan Abranches Joaquim; Joaquim Abranches; Joaquim Santan'
            )
        );
        DB::table('players')->where('name', '=', 'Victorino Fernadnes')->update(
            array( 
                'synonyms' => 'Victorino Fernadnes; Victorino; Fernadnes; Fernadnes Victorino'
            )
        );
        DB::table('players')->where('name', '=', 'Elinton Sanchotene Andrade')->update(
            array( 
                'synonyms' => 'Elinton Sanchotene Andrade; Elinton; Sanchotene Andrade; Elinton Andrade; Sanchotene Andrade'
            )
        );
        DB::table('players')->where('name', '=', 'Laxmikant Kattimani')->update(
            array( 
                'synonyms' => 'Laxmikant Kattimani; Laxmikant Kattimani; Laxmikant; Kattimani; Kattimani Laxmikant'
            )
        );
        DB::table('players')->where('name', '=', 'Luis Xavier Barreto')->update(
            array( 
                'synonyms' => 'Luis Xavier Barreto; Luis; Xavier Barreto; Xavier Barreto Luis'
            )
        );


    }
}
