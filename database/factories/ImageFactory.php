<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Image::class;
    public function definition()
    {
        return [
            'name' => $this->faker->text(rand(10,15)),
            'img_path' => 'https://source.unsplash.com/random',
        ];
    }
}
