<?php

use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('product_type')->delete();

        DB::table('product_type')->insert(
            array(['name' => 'Jersey','created_at' => new DateTime],
            ['name' => 'Accessories','created_at' => new DateTime],
            ['name' => 'Jersey+Accessories','created_at' => new DateTime])
        );


        DB::table('product_type')->insert(
            array(
                ['name' => 'flags','created_at' => new DateTime,'synonyms' =>'flags , flag'],
                ['name' => 'scarves','created_at' => new DateTime, 'synonyms' =>'scarf , scarves'],
                ['name' => 'caps','created_at' => new DateTime,'synonyms' =>'cap , caps'],
                ['name' => 'shirts','created_at' => new DateTime,'synonyms' =>'shirts , shirt'],
                ['name' => 'merchandise','created_at' => new DateTime,'synonyms' =>'merchandise , shopping'],
                ['name' => 'cups','created_at' => new DateTime,'synonyms' =>'cups , cup'],
                ['name' => 'bands','created_at' => new DateTime,'synonyms' =>'bands , band']
            )
        );

    }
}
