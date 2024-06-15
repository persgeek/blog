<?php

namespace PG\Blog\Http\Backend\Slider\Requests;

use PG\Blog\Http\Requests\BaseRequest;

class ArticleRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'articles.*' => ['required', 'exists:blog_articles,id']
        ];
    }
}
