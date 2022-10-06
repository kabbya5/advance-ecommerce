<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Product::class;

    public function definition()
    {
        $product_name = $this->faker->text(rand(15,20));

        return [
            "category_id" => Category::all()->random()->id,
            'subcategory_id' => Subcategory::all()->random()->id,
            'childcategory_id' => Childcategory::all()->random()->id,
            'brand_id' => Brand::all()->random()->id,
            'slider_id' => rand(1,10),
            'seller_id' => User::all()->random()->id,
            'product_name' => $product_name,
            'product_code' => str_slug($this->faker->text(rand(15,20))),
            'size' => "ml,xl,big,small,2xl",
            'color' => "blue,gree,white,blac,light-black",
            'product_quantity' => $this->faker->randomNumber(2,false),
            'slug' => str_slug($product_name),
            'selling_price' => $this->faker->randomNumber(3,false),
            'discount_price' => $this->faker->randomNumber(2),
            'short_text' =>rtrim($this->faker->sentence(rand(8,15)),'.'),
            'description' => $this->faker->paragraph(rand(6,8)),
            'upcomming' => rand(0,1),
            'status' => rand(0,1),
            'free_shipping' => rand(0,1),
            'top_rated'   => rand(0,1),
            'views'   => $this->faker->randomNumber(2),
            'published_at' => Carbon::today()->subDays(rand(0, 365)),
        ];
    }
}
