<?php

namespace PG\Blog\Tests\Http\Frontend\Category;

use PG\Blog\Models\BlogCategory;
use PG\Blog\Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    public function testCanGetCategories()
    {
        BlogCategory::factory()->create();

        $this->getJson('/blog/frontend/categories')
            ->assertSuccessful();
    }

    public function testCanGetCategory()
    {
        BlogCategory::factory()->create();

        $this->getJson('/blog/frontend/categories/1/show')
            ->assertSuccessful();
    }

    public function testCanGetArticles()
    {
        BlogCategory::factory()->hasArticles(10)->create();

        $this->getJson('/blog/frontend/categories/1/articles')
            ->assertSuccessful();
    }
}
