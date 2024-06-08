<?php

namespace PG\Blog\Tests\Http\Backend\Category;

use PG\Blog\Models\BlogCategory;
use PG\Blog\Tests\Models\User;
use PG\Blog\Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    public function testCanNotGetCategories()
    {
        $this->getJson('/blog/backend/categories')
            ->assertUnauthorized();
    }

    public function testCanGetCategories()
    {
        $user = User::make();

        $this->actingAs($user);

        BlogCategory::factory()->create();

        $this->getJson('/blog/backend/categories')
            ->assertSuccessful();
    }

    public function testCanGetCategory()
    {
        $user = User::make();

        $this->actingAs($user);

        BlogCategory::factory()->create();

        $this->getJson('/blog/backend/categories/1/show')
            ->assertSuccessful();
    }

    public function testCanCreateCategory()
    {
        $user = User::make();

        $this->actingAs($user);

        $params = BlogCategory::factory()->make()
            ->toArray();

        $this->postJson('/blog/backend/categories/create', $params)
            ->assertSuccessful();
    }
}
