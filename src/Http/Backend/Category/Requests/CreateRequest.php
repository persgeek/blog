<?php

namespace PG\Blog\Http\Backend\Category\Requests;

use PG\Blog\Http\Requests\BaseRequest;

class CreateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],

            'slug' => ['required', 'string', 'max:255']
        ];
    }
}
