<?php

namespace PG\Blog\Http\Frontend\Article;

use PG\Blog\Http\Frontend\Article\Resources\ArticleResource;
use PG\Blog\Http\Controllers\BaseController;
use PG\Blog\Events\ArticleShow;
use PG\Blog\Models\BlogArticle;

class ArticleController extends BaseController
{
    public function index()
    {
        $articles = BlogArticle::latest()->paginate();

        $isEmpty = $articles->isEmpty();

        if ($isEmpty) {
            $this->raiseNothing();
        }

        return ArticleResource::collection($articles);
    }

    public function show($article)
    {
        $article = BlogArticle::slugOrId($article)->first();

        if (!$article) {
            $this->raiseNothing();
        }

        ArticleShow::dispatch($article);

        return ArticleResource::make($article);
    }
}
