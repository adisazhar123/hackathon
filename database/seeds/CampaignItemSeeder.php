<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaign_item')->insert([
            'description' => 'Indomie',
            'quantity' => 10,
            'campaigns_id' => 1,
            'items_id' => 1
        ]);
    }
}
