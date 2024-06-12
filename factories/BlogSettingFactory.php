<?php

namespace PG\Blog\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PG\Blog\Models\BlogSetting;
use PG\Blog\Enums\SettingEnum;

class BlogSettingFactory extends Factory
{
    public $model = BlogSetting::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),

            'type' => SettingEnum::PUBLIC,

            'value' => $this->faker->name()
        ];
    }
}
