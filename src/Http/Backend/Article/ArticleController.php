<?php

namespace PG\Blog\Http\Backend\Article;

use PG\Blog\Http\Backend\Article\Resources\ArticleResource;
use PG\Blog\Http\Backend\Article\Requests\CategoryRequest;
use PG\Blog\Http\Backend\Article\Requests\CreateRequest;
use PG\Blog\Http\Backend\Article\Requests\UpdateRequest;
use PG\Blog\Http\Backend\Article\Requests\ImageRequest;
use PG\Blog\Http\Controllers\BaseController;
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
        $article = BlogArticle::find($article);

        if (!$article) {
            $this->raiseNothing();
        }

        return ArticleResource::make($article);
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();

        $article = new BlogArticle($data);
        $article->save();

        return ArticleResource::make($article);
    }

    public function update($article, UpdateRequest $request)
    {
        $article = BlogArticle::find($article);

        if (!$article) {
            $this->raiseNothing();
        }

        $data = $request->validated();

        $article->fill($data);
        $article->save();

        return ArticleResource::make($article);
    }

    public function category($article, CategoryRequest $request)
    {
        $article = BlogArticle::find($article);

        if (!$article) {
            $this->raiseNothing();
        }

        $article->categories()
            ->sync($request->categories);

        return ArticleResource::make($article);
    }

    public function image($article, ImageRequest $request)
    {
        $article = BlogArticle::find($article);

        if (!$article) {
            $this->raiseNothing();
        }

        $article->images()
            ->sync($request->images);

        return ArticleResource::make($article);
    }
}
