<?php

namespace PG\Blog\Http\Frontend\Category;

use PG\Blog\Http\Frontend\Category\Resources\CategoryResource;
use PG\Blog\Http\Frontend\Article\Resources\ArticleResource;
use PG\Blog\Http\Controllers\BaseController;
use PG\Blog\Models\BlogCategory;

class CategoryController extends BaseController
{
    public function index()
    {
        $categories = BlogCategory::oldest()->paginate();

        $isEmpty = $categories->isEmpty();

        if ($isEmpty) {
            $this->raiseNothing();
        }

        return CategoryResource::collection($categories);
    }

    public function show($category)
    {
        $category = BlogCategory::slugOrId($category)->first();

        if (!$category) {
            $this->raiseNothing();
        }

        return CategoryResource::make($category);
    }

    public function articles($category)
    {
        $category = BlogCategory::slugOrId($category)->first();

        if (!$category) {
            $this->raiseNothing();
        }

        $articles = $category->articles()->latest()->paginate();

        $isEmpty = $articles->isEmpty();

        if ($isEmpty) {
            $this->raiseNothing();
        }

        return ArticleResource::collection($articles);
    }
}
