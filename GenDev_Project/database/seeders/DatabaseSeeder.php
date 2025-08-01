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

        $this->call([
            CategorySeeder::class,
            CategoryMiniSeeder::class,
            AttributeSeeder::class,
            AttributeValueSeeder::class,
            ProductSeeder::class,
            ProductVariantSeeder::class,
            ProductVariantAttributeSeeder::class,
            RoleAndPermissionSeeder::class,
            UserSeeder::class,
            ShipSeeder::class,
            CouponSeeder::class,
            OrderSeeder::class,
            OrderDetailSeeder::class,
            OrderDetailAttributeSeeder::class,
            OrderStatusLogSeeder::class,
            SupplierSeeder::class,
            SupplierProductPriceSeeder::class,
            ImportSeeder::class,
            ImportDetailSeeder::class,
            PostCategorySeeder::class
        ]);
        
    }
}
