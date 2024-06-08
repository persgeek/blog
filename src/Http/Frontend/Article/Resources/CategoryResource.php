<?php

namespace PG\Blog\Http\Frontend\Article\Resources;

use PG\Blog\Http\Resources\BaseResource;

class CategoryResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'title' => $this->title,

            'slug' => $this->slug
        ];
    }
}
