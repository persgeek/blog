<?php

namespace PG\Blog\Http\Frontend\Article\Resources;

use PG\Blog\Http\Resources\BaseResource;

class ArticleResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'categories' => CategoryResource::collection($this->categories),

            'images' => ImageResource::collection($this->images),

            'title' => $this->title,

            'slug' => $this->slug,

            'description' => $this->description,

            'content' => $this->content,

            'read_time' => $this->readTime,

            'created_at' => $this->created_at,

            'updated_at' => $this->updated_at
        ];
    }
}
