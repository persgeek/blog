<?php

namespace PG\Blog\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PG\Blog\Models\BlogCategory;

class BlogCategoryFactory extends Factory
{
    protected $model = BlogCategory::class;

    public function definition()
    {
        return [
            'title' => 'Lorem Ipsum'
        ];
    }
}
