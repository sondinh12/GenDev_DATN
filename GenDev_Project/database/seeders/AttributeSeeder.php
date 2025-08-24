<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attributes')->insert([
            ['id' => 1, 'name' => 'Màu sắc'],
            ['id' => 2, 'name' => 'Dung lượng'],
        ]);
    }
}