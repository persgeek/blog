<?php

namespace PG\Blog\Http\Backend\Category\Resources;

use PG\Blog\Http\Resources\BaseResource;

class CategoryResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'title' => $this->title,

            'slug' => $this->slug,

            'created_at' => $this->created_at,

            'updated_at' => $this->updated_at
        ];
    }
}
