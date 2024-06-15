<?php

namespace PG\Blog\Http\Frontend\Common\Resources;

use PG\Blog\Http\Frontend\Article\Resources\ArticleResource;
use PG\Blog\Http\Resources\BaseResource;

class SliderResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'articles' => ArticleResource::collection($this->articles),

            'name' => $this->name,

            'slug' => $this->slug
        ];
    }
}
