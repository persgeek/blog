<?php

namespace PG\Blog\Http\Backend\Setting\Resources;

use PG\Blog\Http\Resources\BaseResource;

class SettingResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'name' => $this->name,

            'type' => $this->type,

            'value' => $this->value,

            'created_at' => $this->created_at,

            'updated_at' => $this->updated_at
        ];
    }
}
