<?php

namespace PG\Blog\Http\Backend\Slider\Requests;

use PG\Blog\Http\Requests\BaseRequest;

class CreateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],

            'slug' => ['required', 'string', 'max:255']
        ];
    }
}
