<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Carbon;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            [
                'title' => 'Banner 1',
                'image' => 'banners/banner1.jpg',
                'images' => null,
                'type' => 'static',
                'status' => 'unused',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Banner 2',
                'image' => 'banners/banner2.jpg',
                'images' => null,
                'type' => 'static',
                'status' => 'unused',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Banner 3',
                'image' => 'banners/banner3.png',
                'images' => null,
                'type' => 'static',
                'status' => 'unused',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
