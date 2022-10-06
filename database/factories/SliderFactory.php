<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Slider::class;

    public function definition()
    {
        $sliderName = $this->faker->text(rand(20,30));
        return [
            'img_1' => 'https://source.unsplash.com/random',
            'slider_name' => $sliderName,
            'img_2' => 'https://source.unsplash.com/random',
            'slug' => str_slug($sliderName),
            'status' => rand(0,1),
        ];
    }
}
