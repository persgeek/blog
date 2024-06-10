<?php

namespace PG\Blog\Http\Backend\Image\Resources;

use PG\Blog\Http\Resources\BaseResource;

class ImageResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'title' => $this->title,

            'address' => $this->address,

            'created_at' => $this->created_at,

            'updated_at' => $this->updated_at
        ];
    }
}
