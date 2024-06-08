<?php

namespace PG\Blog\Http\Backend\Article\Requests;

use PG\Blog\Http\Requests\BaseRequest;

class CreateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],

            'slug' => ['required', 'string', 'max:255'],

            'description' => ['required', 'string', 'max:255'],

            'content' => ['required', 'string', 'max:5000']
        ];
    }
}
