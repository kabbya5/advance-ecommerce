<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;
use DB;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productImage = [];
        
        for ($i=1; $i <= 100;$i++){

            $productImage[]=[
                'image_id' => Image::all()->random()->id,
                'product_id' => Product::all()->random()->id,
            ];
        }
        DB::table('product_images')->insert($productImage);
    }
}
