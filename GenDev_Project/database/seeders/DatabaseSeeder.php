<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            // CategorySeed::class,
            // CategoryMiniSeed::class,
            ProductSeeder::class,
            ProductGallerySeeder::class,
            ProductVariantSeeder::class,
            // AttributeSeeder::class,
            // AttributeValueSeeder::class,
            ProductVariantAttributeSeeder::class,
        ]);
    }
}
