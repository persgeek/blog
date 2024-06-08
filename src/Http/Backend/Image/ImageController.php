<?php

namespace PG\Blog\Http\Backend\Image;

use PG\Blog\Http\Backend\Image\Resources\ImageResource;
use PG\Blog\Http\Backend\Image\Requests\CreateRequest;
use PG\Blog\Http\Controllers\BaseController;
use PG\Blog\Models\BlogImage;

class ImageController extends BaseController
{
    public function index()
    {
        $images = BlogImage::latest()->paginate();

        $isEmpty = $images->isEmpty();

        if ($isEmpty) {
            $this->raiseNothing();
        }

        return ImageResource::collection($images);
    }

    public function show($image)
    {
        $image = BlogImage::find($image);

        if (!$image) {
            $this->raiseNothing();
        }

        return ImageResource::make($image);
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();

        $image = new BlogImage($data);
        $image->save();

        return ImageResource::make($image);
    }
}
