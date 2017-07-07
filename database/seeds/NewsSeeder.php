<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->delete();

        //News For FC goa

        DB::table('news')->insert(
        array([
            'title' => 'FC Goa thanks you for your support', 
            'img_url' => 'http://www.fcgoa.in/images/news/big/FC-Goa-thanks-you-for-your-support.jpg', 
            'description' => 'FC Goa would like to extend a hearty “thank you” to each and every one who has supported the Indian Super League (ISL) side whatever little or big manner.
				The team captained by marquee player Lucio finished as runners up after going down 2-3 against Chennaiyin FC in the exhilarating final of the ISL season 2 at the Jawaharlal Nehru stadium in Fatorda, Margao-Goa, on Sunday evening.
				Marquee manager Zico thanked not only his players but the fans at large for backing his side through the season that helped FC Goa go the distance as one big family.
				“It’s a very hard day for every one of us. It’s on this day that I would thank the owners for all the trust in my work. I would like to thank all the players and the support staff for the hard work they put and also especially the fans who showed us all the love,” voiced the Brazilian legend. 
					“My only regret is that our dream did not come through. We would really like to give this title to all the children, the old people and all the people who have been supporting us. One thing we can be sure that we gave everything to reach this far,” he continued. 
					“If anything went wrong, I would like to apologise to every one because the decisions were only mine and I take responsibility. Life goes on and I encourage the people of Goa to continue loving football.”
					Co-owner Dattaraj Salgaocar said, “I would like to thank all our fans for their wholehearted support in all the times. I would also like to thank coach Zico who has been outstanding along with the entire team who have really sacrificed a lot.
					“I would also like to thank our co-owners (Shrinivas Dempo, Virat Kohli and Venugopal Dhoot) and everybody else who have supported us in every kind of situation or crisis. We might have lost the final but won on every other possible aspect. I don’t want to miss anyone but I would like to thank all the people with humility for making us what we are.”',
            'created_at' => new DateTime
            ],
            [
            'title' => 'FC Goa finish the season as runners up, lose 2-3 to Chennaiyin FC', 
            'img_url' => 'http://www.fcgoa.in/images/news/big/FC-Goa-finish-the-season-as-runners-up-lose-to-Chennaiyin-FC.jpg', 
            'description' => 'FC Goa went down 2-3 against Chennaiyin FC in the exhilarating final of the Indian Super League (ISL) season 2 at the Jawaharlal Nehru stadium in Fatorda, Margao-Goa, on Sunday evening.
			After a goalless first half, Bruno Pelisssari had given the southern side the lead by converting a penalty in the 54th minute that was cancelled by Thongkhosiem Haokip in the 58th minute.
			Although Jofre Mateu Gonzalez scored what was thought of as the winner in the 87th minute, two late goals in which John Stiven Mendoza was involved eventually saw the Chennai franchise being crowned champions.
			Zico unbothered his first 11. Romeo Fernandes and Mandar Rao Dessai playing the wingbacks with Rafael Coelho Luiz and Dudu Omagbemi up front.
			Marco Materazzi meanwhile made one change by keeping out Elano to allow Pelissari to take on the pitch with Mendoza and Jeje Lalpekhlua in attack.
			In an early blow to FC Goa, Dudu had to be stretchered out after suffering a knock to the back of his head when Mailson Alves won the aerial duel off Laxmikant Kattimani’s goalkick. In came Jonatan Lucca.
			Pelissari pulled the first trigger in the 17th minute that swayed wide of the left in the 17th minute while Kattimani was alert to clear the ball ahead of Mendoza who was sent through on goal by Jeje.',
            'created_at' => new DateTime
            ],
            [
            'title' => 'Preview: FC Goa vs. Chennaiyin FC', 
            'img_url' => 'http://www.fcgoa.in/images/news/big/Preview-FC-Goa-vs-Chennaiyin-FC.jpg', 
            'description' => 'One of FC Goa and Chennaiyin FC will be crowned the new champions of the Indian Super League (2015) in the final clash that will kick off at 7 PM IST at the Jawaharlal Nehru Stadium in Fatorda, Margao-Goa, on Sunday evening.
				In the entire season, the Gaurs will want their eight victory to count more than the seven prior wins including the 3-0 thrashing of Delhi Dynamos FC to overturn a 1-0 deficit in the first leg of the semifinals and take them to the final.
				“Our team is ready. We will play according to the rules. If we have to play extra time or penalties, we will go the distance. We know the team (Chennaiyin) very well. We lost against them (4-0), but the final will be 50-50 for both teams,” FC Goa coach Zico told reporters during the joint conference in the presence of the coveted trophy.
				“Despite all the injuries we have suffered throughout the tournament, we have 25 players who can play. Only Raju [Gaekwad] will be out and Reinaldo may play,” he added.
				The final being staged in Goa, which is the home of FC Goa, Zico stressed there is no advantage and exclaimed, “The title means crowning of hard work.”',
            'created_at' => new DateTime
            ],
            [
            'title' => 'FC Goa gun down Delhi Dynamos FC 3-0 to enter the final', 
            'img_url' => 'http://www.fcgoa.in/images/news/big/FC-Goa-gun-down-Delhi-Dynamos-FC-to-enter-the-final.jpg', 
            'description' => 'FC Goa scripted their maiden final appearance crushing Delhi Dynamos FC 3-0 in the second leg of their semifinal at the Jawaharlal Nehru stadium in Fatorda, Margao-Goa, on Tuesday evening.
				Jofre Mateu Gonzalez (11’), Rafael Coelho Luiz (27’) and Dudu Omagbemi (84’) were the goalscoring heroes for the Goan franchise who were backed by a deafening home support. Adil Nabi was given the marching orders by referee Pranjal Banerjee due to the Delhi player’s indiscipline on the bench after he was already substituted.
				The Goans could not have asked for a better start to the clash where their favourite team had to win by at least two goals as FC Goa began with a fierce intention to attack that was reflected in Zico’s first 11.
				Romeo Fernandes and Mandar Rao Dessai were deployed on the wings, Rafael and Dudu in attack. Raju Gaekwad, Narayan Das, Reinaldo and CS Sabeeth made way for them while Bikramjit Singh replaced Jonatan Lucca in the midfield.
				Roberto Carlos named an unchanged starting lineup from the first leg of the semifinal that Delhi had won by a solitary goal scored by Robin Singh on Friday.
				All the above named FC Goa players went all out in the attack along with Jofre and Leo Moura. They had the first chance in the seventh minute when the Spaniard’s shot ricocheted off John Arne Riise although Rafael’s picking of the same didn’t end up in anybody at the receiving end of the cross.
				A long delivery by Moura in the 10th minute was headed down by Rafael but Jofre ended up slamming his shot over the bar but in the next minute he cut past Riise with ease to find the back of the net at Antonio Doblas’ left near post off Pronay Halder’s long ball. 1-0.
				With the semifinalists’ score-line level on aggregate, Romeo missed an opportunity after another of his attempt that was blocked by Riise and punched away by the Delhi goalkeeper fell back for him in the 23rd minute.',
            'created_at' => new DateTime
            ])
        );




        //Teams foreign key for News - Assigning team_id to news

        DB::table('news')->where('title', '=', 'FC Goa thanks you for your support')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('news')->where('title', '=', 'FC Goa finish the season as runners up, lose 2-3 to Chennaiyin FC')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('news')->where('title', '=', 'Preview: FC Goa vs. Chennaiyin FC')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
        DB::table('news')->where('title', '=', 'FC Goa gun down Delhi Dynamos FC 3-0 to enter the final')->update(
            array(
                'team_id' => DB::table('teams')->where('name', '=', 'FC Goa')->first()->id
            )
        );
    }
}
