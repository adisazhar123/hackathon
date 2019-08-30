<?php

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
            'email' => 'user1@gmail.com',
            'password' => bcrypt('secret')
        ]);

        User::create([
            'id' => 2,
            'email' => 'user2@gmail.com',
            'password' => bcrypt('secret')
        ]);

        User::create([
            'id' => 3,
            'email' => 'user3@gmail.com',
            'password' => bcrypt('secret')
        ]);

        for ($i = 0; $i < 10; $i++)
        {
            Item::create([
                'title' => $faker->name(),
                'description' => $faker->text(200),
                'item_url' => $faker->url,
                'price' => $faker->numberBetween(20000, 520000)
            ]);
        }

        $campaignType = ["donation", "wishlist"];
        $usersId = [1, 2, 3];

        for ($i = 0; $i < 5; $i++)
        {
            $random = rand(0, 1);
            $randomUser = rand(1, 3);
            \App\Campaign::create([
                'title' => $faker->text(150),
                'description' => $faker->text('800'),
                'deadline' => time(),
                'banner_path' => $faker->imageUrl(),
                'fulfillment_percentage' => 0,
                'shortlink' => "",
                'campaign_type' => $campaignType[$random],
                'target_amount' => $faker->numberBetween(2500000, 500000000),
                'status' => "active",
                'users_id' => $usersId[$randomUser]
            ]);
        }

    }
}
