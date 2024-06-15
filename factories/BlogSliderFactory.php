<?php

namespace PG\Blog\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PG\Blog\Models\BlogSlider;

class BlogSliderFactory extends Factory
{
    protected $model = BlogSlider::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),

            'slug' => $this->faker->unique()->slug()
        ];
    }
}
