<?php

namespace PG\Blog\Http\Backend\Slider\Resources;

use PG\Blog\Http\Resources\BaseResource;

class SliderResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'articles' => ArticleResource::collection($this->articles),

            'name' => $this->name,

            'slug' => $this->slug,

            'created_at' => $this->created_at,

            'updated_at' => $this->updated_at
        ];
    }
}
