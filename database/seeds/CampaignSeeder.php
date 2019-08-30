<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaigns')->insert([
            'title' => Str::random(10),
            'description' => Str::random(10),
            'deadline' => date('Y-m-d h:i:s', time()),
            'banner_path' => 'file.jpg',
            'fulfillment_percentage' => 0.5,
            'shortlink' => 'sample.id/'.Str::random(10),
            'campaign_type' => 'donate',
            'target_amount' => 1000000.0,
            'status' => 'success',
            'users_id' => 1
        ]);
    }
}
