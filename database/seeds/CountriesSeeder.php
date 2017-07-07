<?php

use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();

        DB::table('countries')->insert(
            array([
                'name' => 'India',
                'created_at' => new DateTime,
                'synonyms' => 'Indian; india\'s; home'
                ],
                [
                'name' => 'Brazil',
                'created_at' => new DateTime,
                'synonyms' => 'Brazil; brazilian'
                ],
                [
                'name' => 'Spain',
                'created_at' => new DateTime,
                'synonyms' => 'Spain; spanish'
                ],
                [
                'name' => 'Armenia',
                'created_at' => new DateTime,
                'synonyms' => 'Armenia'
                ],
                [
                'name' => 'France',
                'created_at' => new DateTime,
                'synonyms' => 'France'
                ],
                [
                'name' => 'Ivory Coast',
                'created_at' => new DateTime,
                'synonyms' => 'Ivory Coast; Ivory; coast'
                ],
            	[
                'name' => 'England',
                'created_at' => new DateTime,
                'synonyms' => 'England; English'
                ])
        );
    }
}
