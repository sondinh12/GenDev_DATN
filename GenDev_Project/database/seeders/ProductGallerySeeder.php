<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;

class ProductGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacadesDB::table('product_galleries')->insert([
            ['id' => 1, 'product_id' => 1, 'image' => 'tshirt_side.jpg'],
            ['id' => 2, 'product_id' => 1, 'image' => 'tshirt_back.jpg'],
        ]);
    }
}
