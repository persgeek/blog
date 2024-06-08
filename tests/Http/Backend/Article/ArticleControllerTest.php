<?php

namespace PG\Blog\Tests\Http\Backend\Article;

use PG\Blog\Models\BlogArticle;
use PG\Blog\Tests\Models\User;
use PG\Blog\Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    public function testCanNotGetArticles()
    {
        $this->getJson('/blog/backend/articles')
            ->assertUnauthorized();
    }

    public function testCanGetArticles()
    {
        $user = User::make();

        $this->actingAs($user);

        BlogArticle::factory()->create();

        $this->getJson('/blog/backend/articles')
            ->assertSuccessful();
    }

    public function testCanGetArticle()
    {
        $user = User::make();

        $this->actingAs($user);

        BlogArticle::factory()->create();

        $this->getJson('/blog/backend/articles/1/show')
            ->assertSuccessful();
    }

    public function testCanCreateArticle()
    {
        $user = User::make();

        $this->actingAs($user);

        $params = BlogArticle::factory()->make()
            ->toArray();

        $this->postJson('/blog/backend/articles/create', $params)
            ->assertSuccessful();
    }
}
