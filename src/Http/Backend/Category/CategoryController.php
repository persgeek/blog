<?php

namespace PG\Blog\Http\Backend\Category;

use PG\Blog\Http\Backend\Category\Resources\CategoryResource;
use PG\Blog\Http\Backend\Category\Requests\CreateRequest;
use PG\Blog\Http\Backend\Category\Requests\UpdateRequest;
use PG\Blog\Http\Controllers\BaseController;
use PG\Blog\Models\BlogCategory;

class CategoryController extends BaseController
{
    public function index()
    {
        $categories = BlogCategory::latest()->paginate();

        $isEmpty = $categories->isEmpty();

        if ($isEmpty) {
            $this->raiseNothing();
        }

        return CategoryResource::collection($categories);
    }

    public function show($category)
    {
        $category = BlogCategory::find($category);

        if (!$category) {
            $this->raiseNothing();
        }

        return CategoryResource::make($category);
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();

        $category = new BlogCategory($data);
        $category->save();

        return CategoryResource::make($category);
    }

    public function update($category, UpdateRequest $request)
    {
        $category = BlogCategory::find($category);

        if (!$category) {
            $this->raiseNothing();
        }

        $data = $request->validated();

        $category->fill($data);
        $category->save();

        return CategoryResource::make($category);
    }
}
