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

        Item::create([
            'id' => 100,
            'title' => 'Samsung Galaxy A50 4/64 RAM 4GB ROM 64GB GARANSI RESMI SEIN - Hitam',
            'description' => 'Network 	Technology 	
GSM / HSPA / LTE
Launch 	Announced 	2019, February
Status 	Available. Released 2019, March
Body 	Dimensions 	158.5 x 74.7 x 7.7 mm (6.24 x 2.94 x 0.30 in)
Weight 	166 g (5.86 oz)
Build 	Front glass, plastic body
SIM 	Single SIM (Nano-SIM) or Dual SIM (Nano-SIM, dual stand-by)
Display 	Type 	Super AMOLED capacitive touchscreen, 16M colors
Size 	6.4 inches, 100.5 cm2 (~84.9% screen-to-body ratio)
Resolution 	1080 x 2340 pixels, 19.5:9 ratio (~403 ppi density)
Protection 	Corning Gorilla Glass 3
Platform 	OS 	Android 9.0 (Pie)
Chipset 	Exynos 9610 Octa (10nm)
CPU 	Octa-core (4x2.3 GHz Cortex-A73 & 4x1.7 GHz Cortex-A53)
GPU 	Mali-G72 MP3
Memory 	Card slot 	microSD, up to 512 GB (dedicated slot)
Internal 	4/64 GB RAM
Main Camera 	Triple 	25 MP, f/1.7, PDAF
8 MP, f/2.2, 12mm (ultrawide)
5 MP, f/2.2, depth sensor
Features 	LED flash, panorama, HDR
Video 	1080p@30fps
Selfie camera 	Single 	25 MP, f/2.0
Features 	HDR
Video 	1080p@30fps
Sound 	Loudspeaker 	Yes
3.5mm jack 	Yes
	Active noise cancellation with dedicated mic
Comms 	WLAN 	Wi-Fi 802.11 a/b/g/n/ac, dual-band, WiFi Direct, hotspot
Bluetooth 	5.0, A2DP, LE
GPS 	Yes, with A-GPS, GLONASS, GALILEO, BDS
NFC 	No
USB 	2.0, Type-C 1.0 reversible connector
Features 	Sensors 	Fingerprint (under display), accelerometer, gyro, proximity, compass
	ANT+
Battery 	 	Non-removable Li-Po 4000 mAh battery',
            'item_url' => 'https://www.tokopedia.com/cellularmas/samsung-galaxy-a50-4-64-ram-4gb-rom-64gb-garansi-resmi-sein-hitam?trkid=f%3DCa0000L000P0W0S0Sh%2CCo0Po0Fr0Cb0_src%3Duniverse_page%3D1_ob%3D23_q%3Dsamsung+galaxy+a50_po%3D1_catid%3D3054&whid=0',
            'price' => 3285000,
            'image_path' => 'https://ecs7.tokopedia.net/img/cache/700/product-1/2019/4/19/628764/628764_2cb3453c-9a63-4019-b0e2-f8cc52c6d42a_839_727.jpg'
        ]);

        Item::create([
            'id' => 101,
            'title' => ' SAMSUNG GALAXY A70 2019 GARANSI RESMI SAMSUNG INDONESIA SEIN - Hitam ',
            'description' => 'GARANSI RESMI SEIN SAMSUNG INDONESIA 1 Tahun (bisa klaim di Indonesia) Kartu Garansi ada di salah satu halaman buku panduan singkat.TIDAK BISA DI KLIK = STOK KOSONG, TERSEDIA VARIAN:',
            'item_url' => 'https://www.tokopedia.com/samuderasports/samsung-galaxy-a70-2019-garansi-resmi-samsung-indonesia-sein-hitam?src=topads',
            'price' => 5049000,
            'image_path' => 'https://ecs7.tokopedia.net/img/cache/700/product-1/2019/5/9/4505838/4505838_5a8e7354-f340-44d2-a91c-9a2070c7a5ff_779_779'
        ]);

        Item::create([
            'id' => 102,
            'title' => ' iphone x ten 256gb second fullset no minus - Silver ',
            'description' => '- ALL UNIT 98-99% Mulus Standar second ya karena bukan baru
- ALL UNIT FU (FACTORY UNLOCK) / BISA Semua Operator INDO
- ALL Unit Tidak Ada Yang Sangkut ID iCloud Aktivasi ! iCloud AMAN !',
            'item_url' => 'https://www.tokopedia.com/excelappleshop/iphone-x-ten-256gb-second-fullset-no-minus-silver-57d1?src=topads',
            'price' => 9998000,
            'image_path' => 'https://ecs7.tokopedia.net/img/cache/700/product-1/2019/4/20/5158575/5158575_59df2fb5-6903-42fc-8ea1-d30bc6c17402_1280_1280.jpeg'
        ]);

        Item::create([
            'id' => 103,
            'title' => 'Kaos New Balance original dryfit quickdry not salomon hokka one UA',
            'description' => 'Kaos new balance core run tee
            New
            Original 100%
            
            Size M L XL
            Uk luar/US
            M. Lebar 50cm/ panjang 69cm ( SOLD OUT)
            L. Lebar 55cm/ panjang 72cm
            Xl. Lebar 60cm/ panjang 76cm ( sold out)
            Sisa L ajah
            Kalo mau Motif lain ada size lain ada di lapak saya yg lain cek ya ',
            'item_url' => 'https://www.tokopedia.com/selamatpagi/kaos-new-balance-original-dryfit-quickdry-not-salomon-hokka-one-ua?trkid=f=Ca0000L000P0W0S0Sh00Co0Po0Fr0Cb0_src=other-product_page=1_ob=32_q=_po=1_catid=1486&whid=0&src=other',
            'image_path' => 'https://ecs7.tokopedia.net/img/cache/700/attachment/2018/7/24/153245026942720/153245026942720_ddf7dd75-5c06-4420-ab6b-3eca5ae77b73.png',
            'price' => 130000
        ]);

        Item::create([
            'id' => 104,
            'title' => 'new balance running quickdry original not 2XU salomon under armour',
            'description' => 'Tolong tidak ditanyakan yg sudah dijelaskan diketerangan.. baca sampe selese
            terimaksih..
            
            New balance 7in 2in1 short
            New balance running/outdoor
            Bahan quickdry/dryfit cepat kering
            Ringan/ultralight
            Adem nyaman dan melar/elastis
            Celana ada daleman/inner sesui gambar
            
            New 100% with tag polybag
            Original 100% garansi uangkmbali tidak sesui
            
            Stoknya
            SISA MERAH S M L
            hitam/ black HABIS/SOLD OUT
            
            
            Size chart kolor ( diukur diameter belum melar)
            S 68cm
            M 77cm
            L 81cm ',
            'item_url' => 'https://www.tokopedia.com/selamatpagi/new-balance-running-quickdry-original-not-2xu-salomon-under-armour?trkid=f=Ca0000L000P0W0S0Sh00Co0Po0Fr0Cb0_src=other-product_page=1_ob=32_q=_po=2_catid=1486&whid=0&src=other',
            'image_path' => 'https://ecs7.tokopedia.net/img/cache/700/product-1/2017/6/9/618595/618595_065193d4-c977-41fb-b44b-27cabfb8a887.jpg',
            'price' => 120000
        ]);

        Item::create([
            'id' => 105,
            'title' => 'Fork rockshox boxxer WC worldcup 27.5 650b not fox float 40 summum v10',
            'description' => 'Fork rockshox boxxer WC
            World cup air
            650b / 27.5”
            Travel 200mm
            Kondisi bekas sangat normal 100%
            Sudah upgrade sealdust black original rockshox
            Top crown sudah yang flat/pendek tidak seperti bawaan yang cenderung tinggi ( lumayan mahal kalo beli terpisah) tidak perlu upgrade apalagi service “sudah siap pancal hehe..
            
            Kndisi mulus lecet wajar pemakaian...
            fork rawatan tidak asal pakai ya hehe..
            bekas pemakaian saya sendiri (aman sehat)
            no minus
            Semua lengkap dan fungsi normal 100% dijamin',
            'item_url' => 'https://www.tokopedia.com/selamatpagi/fork-rockshox-boxxer-wc-worldcup-27-5-650b-not-fox-float-40-summum-v10',
            'image_path' => 'https://ecs7.tokopedia.net/img/cache/700/attachment/2019/7/16/156328472102787/156328472102787_bcc33500-4299-4135-b7be-3ee00afcf40b.png',
            'price' => 9980000
        ]);

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

        for ($i = 1; $i < 7; $i++)
        {
            \App\CampaignItem::create([
                'description' => $faker->text,
                'quantity' => $faker->numberBetween(1, 100),
                'campaign_id' => 1,
                'item_id' => $i,
                'percentage' => 0
            ]);
        }

        for ($i = 1; $i < 7; $i++)
        {
            \App\CampaignItem::create([
                'description' => $faker->text,
                'quantity' => $faker->numberBetween(1, 100),
                'campaign_id' => 2,
                'item_id' => $i,
                'percentage' => 0
            ]);
        }

        for ($i = 1; $i <= 4; $i++)
        {
            \App\CampaignItem::create([
                'description' => $faker->text,
                'quantity' => $faker->numberBetween(1, 100),
                'campaign_id' => 3,
                'item_id' => $i,
                'percentage' => 0
            ]);
        }

        for ($i = 1; $i <= 7; $i++)
        {
            \App\CampaignItem::create([
                'description' => $faker->text,
                'quantity' => $faker->numberBetween(1, 100),
                'campaign_id' => 4,
                'item_id' => $i,
                'percentage' => 0
            ]);
        }

    }
}
