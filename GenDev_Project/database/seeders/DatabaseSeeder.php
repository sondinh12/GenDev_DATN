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
        // User::factory(10)->create();

<<<<<<< HEAD
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
=======
        $this->call([
            // CategorySeeder::class,
            // AttributeSeeder::class,
            // AttributeValueSeeder::class,
            ProductSeeder::class,
            ProductGallerySeeder::class,
            ProductVariantSeeder::class,
            ProductVariantAttributeSeeder::class,
>>>>>>> 45c005b5a31bda1b557009ed654c2df9b9979443
        ]);
    }
}
