<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeedder::class,
            BrandTableSedder::class,
            CategoryTableSeeder::class,
            SubcategoryTableSeeder::class,
            ChildcategoryTableSeeder::class,
            ProductTableSeeder::class,
            ImageTableSeeder::class,
            TagTableSeeder::class,
            SliderTableSeeder::class,
            ProductImagesTableSeeder::class,
            ProductTableSeeder::class,
            OrderTableSeeder::class,
            ShippingTableSeeder::class,
        ]);      
    }
}
