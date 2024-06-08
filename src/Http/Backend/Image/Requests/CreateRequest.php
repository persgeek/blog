<?php

namespace PG\Blog\Http\Backend\Image\Requests;

use PG\Blog\Http\Requests\BaseRequest;

class CreateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],

            'type' => ['required', 'string', 'max:255'],

            'path' => ['required', 'image']
        ];
    }
}
