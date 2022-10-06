<?php

namespace Database\Factories;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubcategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Subcategory::class;

    public function definition()
    {
        $subcat_name = $this->faker->text(rand(15,20));
        return [
            'category_id' => Category::all()->random()->id,
            'subcat_name' => $subcat_name,
            'slug' => str_slug($subcat_name),
        ];
    }
}
