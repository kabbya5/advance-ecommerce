<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Brand::class;
    public function definition()
    {
        $brand_name = $this->faker->text(rand(15,20));
        return [
            'name' => $brand_name,
            'slug' => str_slug($brand_name),
            'brand_img' => 'https://source.unsplash.com/random',
        ];
    }
}
