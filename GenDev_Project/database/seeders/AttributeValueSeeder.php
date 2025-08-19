<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attribute_values')->insert([
            // Màu sắc
            ['id' => 1, 'attribute_id' => 1, 'value' => 'Đen'],
            ['id' => 2, 'attribute_id' => 1, 'value' => 'Trắng'],
            ['id' => 3, 'attribute_id' => 1, 'value' => 'vàng'],
            ['id' => 8, 'attribute_id' => 1, 'value' => 'xanh'],
            ['id' => 9, 'attribute_id' => 1, 'value' => 'đỏ'],

            // Dung lượng
            ['id' => 4, 'attribute_id' => 2, 'value' => '64GB'],
            ['id' => 5, 'attribute_id' => 2, 'value' => '128GB'],
            ['id' => 6, 'attribute_id' => 2, 'value' => '512GB'],
            ['id' => 7, 'attribute_id' => 2, 'value' => '1TB'],
        ]);
    }
}