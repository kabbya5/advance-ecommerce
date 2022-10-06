<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use DB;

class ProductableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productable = [];

        for($i=1;$i<=140;$i++){

            $productable[] = [
                'product_id' => Product::all()->random()->id,
                'productable_id' => Tag::all()->random()->id,
                'productable_type' => "App\Models\Tag",
            ];
        }

        DB::table('productables')->insert($productable);
    }
}
