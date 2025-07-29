<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('attributes')->insert([
            ['id' => 1, 'name' => 'Color'],
            ['id' => 2, 'name' => 'Capacity'],
        ]);
    }
}