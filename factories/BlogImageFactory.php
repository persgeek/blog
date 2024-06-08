<?php

namespace PG\Blog\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PG\Blog\Models\BlogImage;

class BlogImageFactory extends Factory
{
    protected $model = BlogImage::class;

    public function definition()
    {
        return [
            'title' => 'Coffe',

            'type' => 'image',

            'path' => 'coffe.png'
        ];
    }
}
