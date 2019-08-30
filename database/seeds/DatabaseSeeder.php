<?php

use App\User;
use Illuminate\Database\Seeder;

use App\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        \Illuminate\Support\Facades\DB::table('items')->delete();
        \Illuminate\Support\Facades\DB::table('campaigns')->delete();
        \Illuminate\Support\Facades\DB::table('campaign_item')->delete();
        \Illuminate\Support\Facades\DB::table('contributions')->delete();
        \Illuminate\Support\Facades\DB::table('users')->delete();

        User::create([
            'id' => 1,
            "name" => "user1",
            'email' => 'user1@gmail.com',
            'password' => bcrypt('secret')
        ]);

        User::create([
            'id' => 2,
            "name" => "user2",
            'email' => 'user2@gmail.com',
            'password' => bcrypt('secret')
        ]);

        User::create([
            'id' => 3,
            "name" => "user3",
            'email' => 'user3@gmail.com',
            'password' => bcrypt('secret')
        ]);

        $x = 1;
        for ($i = 0; $i < 10; $i++)
        {
            Item::create([
                'id' => $x,
                'title' => $faker->name(),
                'description' => $faker->text(200),
                'item_url' => $faker->url,
                'price' => $faker->numberBetween(20000, 520000),
                'image_path' => $faker->imageUrl()
            ]);
            $x++;
        }

        $campaignType = ["donation", "wishlist"];
        $usersId = [1, 2, 3];

        $cId = 1;
        for ($i = 0; $i < 5; $i++)
        {
            $random = rand(0, 1);
            $randomUser = random_int(0, 2);
            \App\Campaign::create([
                'id' => $cId,
                'title' => $faker->text(150),
                'description' => $faker->text('800'),
                'deadline' => now(),
                'banner_path' => $faker->imageUrl(),
                'fulfillment_percentage' => 0,
                'shortlink' => "",
                'campaign_type' => $campaignType[$random],
                'target_amount' => $faker->numberBetween(2500000, 5000000),
                'status' => "active",
                'users_id' => $usersId[$randomUser]
            ]);
            $cId++;
        }

        for ($i = 0; $i < 7; $i++)
        {
            \App\CampaignItem::create([
                'description' => $faker->text,
                'quantity' => $faker->numberBetween(1, 100),
                'campaign_id' => 1,
                'item_id' => random_int(1, 10),
                'percentage' => 0
            ]);
        }

        for ($i = 0; $i < 7; $i++)
        {
            \App\CampaignItem::create([
                'description' => $faker->text,
                'quantity' => $faker->numberBetween(1, 100),
                'campaign_id' => 2,
                'item_id' => random_int(1, 10),
                'percentage' => 0
            ]);
        }

        for ($i = 0; $i < 4; $i++)
        {
            \App\CampaignItem::create([
                'description' => $faker->text,
                'quantity' => $faker->numberBetween(1, 100),
                'campaign_id' => 3,
                'item_id' => random_int(1, 10),
                'percentage' => 0
            ]);
        }

        for ($i = 0; $i < 7; $i++)
        {
            \App\CampaignItem::create([
                'description' => $faker->text,
                'quantity' => $faker->numberBetween(1, 100),
                'campaign_id' => 4,
                'item_id' => random_int(1, 10),
                'percentage' => 0
            ]);
        }

    }
}
