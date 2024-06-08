<?php

namespace PG\Blog\Http\Backend\Article\Requests;

use PG\Blog\Http\Requests\BaseRequest;

class CategoryRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'categories.*' => ['exists:blog_categories,id']
        ];
    }
}
