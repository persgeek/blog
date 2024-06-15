<?php

namespace PG\Blog\Tests\Http\Backend\Slider;

use PG\Blog\Tests\Models\User;
use PG\Blog\Models\BlogSlider;
use PG\Blog\Tests\TestCase;


class SliderControllerTest extends TestCase
{
    public function testCanNotGetSliders()
    {
        $this->getJson('/blog/backend/sliders')
            ->assertUnauthorized();
    }

    public function testCanGetSliders()
    {
        $user = User::make();

        $this->actingAs($user);

        BlogSlider::factory()->create();

        $this->getJson('/blog/backend/sliders')
            ->assertSuccessful();
    }

    public function testCanGetSlider()
    {
        $user = User::make();

        $this->actingAs($user);

        BlogSlider::factory()->create();

        $this->getJson('/blog/backend/sliders/1/show')
            ->assertSuccessful();
    }

    public function testCanCreateSlider()
    {
        $user = User::make();

        $this->actingAs($user);

        $params = BlogSlider::factory()->make()
            ->toArray();

        $this->postJson('/blog/backend/sliders/create', $params)
            ->assertSuccessful();
    }
}
