<?php

namespace PG\Blog\Tests\Http\Frontend\Article;

use PG\Blog\Models\BlogArticle;
use PG\Blog\Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    public function testCanGetArticles()
    {
        BlogArticle::factory()->create();

        $this->getJson('/blog/frontend/articles')
            ->assertSuccessful();
    }

    public function testCanGetArticle()
    {
        BlogArticle::factory()->create();

        $this->getJson('/blog/frontend/articles/1/show')
            ->assertSuccessful();
    }
}
