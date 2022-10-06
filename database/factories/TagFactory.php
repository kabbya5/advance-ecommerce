<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Tag::class;

    public function definition()
    {
        $tag_name = $this->faker->text(rand(10,15));
        return [
            'tag_name' =>  $tag_name,
            'slug' => str_slug($tag_name),
            'tag_img' => 'https://source.unsplash.com/random',
        ];
    }
}
