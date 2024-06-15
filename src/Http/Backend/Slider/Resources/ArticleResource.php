<?php

namespace PG\Blog\Http\Backend\Slider\Resources;

use PG\Blog\Http\Resources\BaseResource;

class ArticleResource extends BaseResource
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
