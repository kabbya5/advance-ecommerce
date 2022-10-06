<?php

namespace Database\Factories;

use App\Models\Childcategory;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildcategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Childcategory::class;


    public function definition()
    {
        $childcat_name = $this->faker->text(rand(15,20));

        return [
            'subcategory_id' => Subcategory::all()->random()->id,
            'childcat_name' => $childcat_name,
            'slug' => $childcat_name,

        ];
    }
}
