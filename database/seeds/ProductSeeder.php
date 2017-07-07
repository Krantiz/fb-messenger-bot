<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();

        DB::table('products')->insert(
          array([
            'name' => 'FC GOA - ORANGE ROUND NECK MEN',
            'price' => 'Rs. 340.00',
            'buying_url' => 'http://www.thefanstore.in/collections/fc-goa/products/fc-goa-2014-men-s-round-neck-orange-cotton',
            'image' => 'http://cdn.shopify.com/s/files/1/0963/7452/products/IMG_4192_-_Copy_2_-_Copy_1024x1024.JPG?v=1445430391',
            'created_at' => new DateTime
            ],
            [
            'name' => 'FC GOA 2015 – BLUE POLO MEN',
            'price' => 'Rs. 480.00',
            'buying_url' => 'http://www.thefanstore.in/collections/fc-goa/products/fc-goa-2014-men-s-polo-neck-blue-cotton',
            'image' => 'http://cdn.shopify.com/s/files/1/0963/7452/products/IMG_4230_-_Copy_-_Copy_-_Copy_1024x1024.JPG?v=1442945310',
            'created_at' => new DateTime
            ],
            [
            'name' => 'FC GOA- ORANGE ROUND NECK KIDS',
            'price' => 'Rs. 340.00',
            'buying_url' => 'http://www.thefanstore.in/collections/fc-goa/products/fc-goa-orange-round-neck-kids',
            'image' => 'http://cdn.shopify.com/s/files/1/0963/7452/products/IMG_4827_a_1024x1024.jpg?v=1446477414',
            'created_at' => new DateTime
            ],
            [
            'name' => 'FC GOA 2015 – BLUE POLO KIDS',
            'price' => 'Rs. 380.00',
            'buying_url' => 'http://www.thefanstore.in/collections/fc-goa/products/fc-goa-2015-blue-polo-kids',
            'image' => 'http://cdn.shopify.com/s/files/1/0963/7452/products/IMG_4831_a_1024x1024.jpg?v=1446477373',
            'created_at' => new DateTime
            ],
            [
            'name' => 'FC GOA- VEST MEN',
            'price' => 'Rs. 380.00 ',
            'buying_url' => 'http://www.thefanstore.in/collections/fc-goa/products/fc-goa-vest-mens',
            'image' => 'http://cdn.shopify.com/s/files/1/0963/7452/products/Vest_1_1024x1024.jpeg?v=1443632158',
            'created_at' => new DateTime
            ],
            [
            'name' => 'FC GOA- VEST WOMEN',
            'price' => 'Rs. 380.00',
            'buying_url' => 'http://www.thefanstore.in/collections/fc-goa/products/fc-goa-vest-women',
            'image' => 'http://cdn.shopify.com/s/files/1/0963/7452/products/IMG_4817_a_1024x1024.jpg?v=1446477755',
            'created_at' => new DateTime
            ],
            [
            'name' => 'FC GOA- SILICON BAND',
            'price' => 'Rs. 40.00',
            'buying_url' => 'http://www.thefanstore.in/collections/fc-goa/products/fc-goa-silicon-band',
            'image' => 'http://cdn.shopify.com/s/files/1/0963/7452/products/band_1024x1024.jpg?v=1446477182',
            'created_at' => new DateTime
            ],
            [
            'name' => 'FC GOA- KEYCHAIN',
            'price' => 'Rs. 50.00',
            'buying_url' => 'http://www.thefanstore.in/collections/fc-goa/products/fc-goa-keychain',
            'image' => 'http://cdn.shopify.com/s/files/1/0963/7452/products/Keychain_1024x1024.jpg?v=1443625834',
            'created_at' => new DateTime
            ],
            [
            'name' => 'FC GOA 2015- STICKERS',
            'price' => 'Rs. 40.00',
            'buying_url' => 'http://www.thefanstore.in/collections/fc-goa/products/fc-goa-2015-car-stickers',
            'image' => 'http://cdn.shopify.com/s/files/1/0963/7452/products/8_x_3.5_1024x1024.jpg?v=1443952277',
            'created_at' => new DateTime
            ],
            [
            'name' => 'FC GOA 2015- FLAG',
            'price' => 'Rs. 90.00 ',
            'buying_url' => 'http://www.thefanstore.in/collections/fc-goa/products/fc-goa-2015-flag',
            'image' => 'http://cdn.shopify.com/s/files/1/0963/7452/products/IMG_4918_1024x1024.jpg?v=1446477135',
            'created_at' => new DateTime
            ],
            [
            'name' => 'FC GOA MUG',
            'price' => 'Rs. 200.00',
            'buying_url' => 'http://www.thefanstore.in/collections/fc-goa/products/fc-goa-mug',
            'image' => 'http://cdn.shopify.com/s/files/1/0963/7452/products/IMG_4900_1024x1024.jpg?v=1446476924',
            'created_at' => new DateTime
            ],
            [
            'name' => 'FC GOA- FAN STARTER PACK BUNDLE (TEE + STICKER)',
            'price' => 'Rs. 340.00 ',
            'buying_url' => 'http://www.thefanstore.in/collections/fc-goa/products/fc-goa-fan-starter-pack',
            'image' => 'http://cdn.shopify.com/s/files/1/0963/7452/products/IMG_3028_1024x1024.JPG?v=1446732509',
            'created_at' => new DateTime
            ],
            [
            'name' => 'FC GOA 2015 – SMART PACK BUNDLE (POLO + SILICON BAND)',
            'price' => 'Rs. 480.00 ',
            'buying_url' => 'http://www.thefanstore.in/collections/fc-goa/products/fc-goa-2015-smart-pack',
            'image' => 'http://cdn.shopify.com/s/files/1/0963/7452/products/IMG_2993_1024x1024.JPG?v=1446730818',
            'created_at' => new DateTime
            ],
            [
            'name' => 'FC GOA- CHILL OUT PACK BUNDLE (VEST + SILICON BAND)',
            'price' => 'Rs. 380.00',
            'buying_url' => 'http://www.thefanstore.in/collections/fc-goa/products/fc-goa-vest-men-bundle-vest-silicon-band',
            'image' => 'http://cdn.shopify.com/s/files/1/0963/7452/products/IMG_2989_1024x1024.JPG?v=1446730721',
            'created_at' => new DateTime
            ],
            [
            'name' => 'FC GOA- CHILL OUT PACK BUNDLE (VEST WOMEN + SILICON BAND)',
            'price' => 'Rs. 380.00',
            'buying_url' => 'http://www.thefanstore.in/collections/fc-goa/products/fc-goa-chill-out-pack-bundloevest-women-silicon-band',
            'image' => 'http://cdn.shopify.com/s/files/1/0963/7452/products/IMG_3029_1024x1024.JPG?v=1446732683',
            'created_at' => new DateTime
            ],
            [
            'name' => 'FC GOA- BEACH PACK BUNDLE (VEST + FOOTBALL)',
            'price' => 'Rs. 650.00',
            'buying_url' => 'http://www.thefanstore.in/collections/fc-goa/products/fc-goa-beach-pack-bundle-vest-football',
            'image' => 'http://cdn.shopify.com/s/files/1/0963/7452/products/IMG_2991_1024x1024.JPG?v=1446732824',
            'created_at' => new DateTime
            ])
      );
      

      //product type Foreign keys for product


      
        DB::table('products')->where('name', '=', 'FC GOA - ORANGE ROUND NECK MEN')->update(
            array(
                'type' => DB::table('product_type')->where('name', '=', 'Jersey')->first()->id
            )
        );
        DB::table('products')->where('name', '=', 'FC GOA 2015 – BLUE POLO MEN')->update(
            array(
                'type' => DB::table('product_type')->where('name', '=', 'Jersey')->first()->id
            )
        );
        DB::table('products')->where('name', '=', 'FC GOA- ORANGE ROUND NECK KIDS')->update(
            array(
                'type' => DB::table('product_type')->where('name', '=', 'Jersey')->first()->id
            )
        );
        DB::table('products')->where('name', '=', 'FC GOA 2015 – BLUE POLO KIDS')->update(
            array(
                'type' => DB::table('product_type')->where('name', '=', 'Jersey')->first()->id
            )
        );
        DB::table('products')->where('name', '=', 'FC GOA- VEST MEN')->update(
            array(
                'type' => DB::table('product_type')->where('name', '=', 'Jersey')->first()->id
            )
        );
        DB::table('products')->where('name', '=', 'FC GOA- VEST WOMEN')->update(
            array(
                'type' => DB::table('product_type')->where('name', '=', 'Jersey')->first()->id
            )
        );
        DB::table('products')->where('name', '=', 'FC GOA- SILICON BAND')->update(
            array(
                'type' => DB::table('product_type')->where('name', '=', 'Accessories')->first()->id
            )
        );
        DB::table('products')->where('name', '=', 'FC GOA- KEYCHAIN')->update(
            array(
                'type' => DB::table('product_type')->where('name', '=', 'Accessories')->first()->id
            )
        );
        DB::table('products')->where('name', '=', 'FC GOA 2015- STICKERS')->update(
            array(
                'type' => DB::table('product_type')->where('name', '=', 'Accessories')->first()->id
            )
        );
        DB::table('products')->where('name', '=', 'FC GOA 2015- FLAG')->update(
            array(
                'type' => DB::table('product_type')->where('name', '=', 'Accessories')->first()->id
            )
        );
        DB::table('products')->where('name', '=', 'FC GOA MUG')->update(
            array(
                'type' => DB::table('product_type')->where('name', '=', 'Accessories')->first()->id
            )
        );
        DB::table('products')->where('name', '=', 'FC GOA- FAN STARTER PACK BUNDLE (TEE + STICKER)')->update(
            array(
                'type' => DB::table('product_type')->where('name', '=', 'Jersey+Accessories')->first()->id
            )
        );
        DB::table('products')->where('name', '=', 'FC GOA 2015 – SMART PACK BUNDLE (POLO + SILICON BAND)')->update(
            array(
                'type' => DB::table('product_type')->where('name', '=', 'Jersey+Accessories')->first()->id
            )
        );
        DB::table('products')->where('name', '=', 'FC GOA- CHILL OUT PACK BUNDLE (VEST + SILICON BAND)')->update(
            array(
                'type' => DB::table('product_type')->where('name', '=', 'Jersey+Accessories')->first()->id
            )
        );
        DB::table('products')->where('name', '=', 'FC GOA- CHILL OUT PACK BUNDLE (VEST WOMEN + SILICON BAND)')->update(
            array(
                'type' => DB::table('product_type')->where('name', '=', 'Jersey+Accessories')->first()->id
            )
        );
        DB::table('products')->where('name', '=', 'FC GOA- BEACH PACK BUNDLE (VEST + FOOTBALL)')->update(
            array(
                'type' => DB::table('product_type')->where('name', '=', 'Jersey+Accessories')->first()->id
            )
        );
    

    }
}
