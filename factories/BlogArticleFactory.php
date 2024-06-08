<?php

namespace PG\Blog\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PG\Blog\Models\BlogArticle;

class BlogArticleFactory extends Factory
{
    protected $model = BlogArticle::class;

    public function definition()
    {
        return [
            'title' => $this->faker->title(),

            'slug' => $this->faker->unique()->slug(),

            'description' => $this->faker->text(),

            'content' => $this->faker->text()
        ];
    }
}
