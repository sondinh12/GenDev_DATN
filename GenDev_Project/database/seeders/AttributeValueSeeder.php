<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB ;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attribute_values')->insert([
            // Color
            ['id' => 1, 'attribute_id' => 1, 'value' => 'Red'],
            ['id' => 2, 'attribute_id' => 1, 'value' => 'Blue'],
            ['id' => 3, 'attribute_id' => 1, 'value' => 'Green'],

            // Capacity
            ['id' => 4, 'attribute_id' => 2, 'value' => '32GB'],
            ['id' => 5, 'attribute_id' => 2, 'value' => '64GB'],
            ['id' => 6, 'attribute_id' => 2, 'value' => '128GB'],
        ]);
    }
}
