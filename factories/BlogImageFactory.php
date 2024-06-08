<?php

namespace PG\Blog\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use PG\Blog\Models\BlogImage;

class BlogImageFactory extends Factory
{
    protected $model = BlogImage::class;

    public function definition()
    {
        return [
            'title' => $this->faker->title(),

            'path' => UploadedFile::fake()->image('coffe.png')
        ];
    }
}
