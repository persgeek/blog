<?php

namespace PG\Blog\Http\Backend\Setting\Requests;

use PG\Blog\Http\Requests\BaseRequest;

class CreateRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],

            'type' => ['required', 'string', 'max:255'],

            'value' => ['required', 'string', 'max:255']
        ];
    }
}
