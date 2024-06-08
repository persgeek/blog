<?php

namespace PG\Blog\Events;

use Illuminate\Foundation\Events\Dispatchable;
use PG\Blog\Models\BlogArticle;

class ArticleShow
{
    use Dispatchable;

    public $article;

    public function __construct(BlogArticle $article)
    {
        $this->article = $article;
    }
}
