<?php

namespace PG\Blog\Http\Backend\Article\Requests;

use PG\Blog\Http\Requests\BaseRequest;

class ImageRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'images.*' => ['exists:blog_images,id']
        ];
    }
}
