<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'title' => 'Indomie',
            'description' => 'Ini indoemie',
            'item_url' => 'image.jpg',
            'price' => 2500.0
        ]);
        DB::table('items')->insert([
            'title' => 'Telur',
            'description' => 'Ini Telur',
            'item_url' => 'image.jpg',
            'price' => 1500.0
        ]);
        DB::table('items')->insert([
            'title' => 'Beras',
            'description' => 'Ini beras',
            'item_url' => 'image.jpg',
            'price' => 12500.0
        ]);
    }
}
