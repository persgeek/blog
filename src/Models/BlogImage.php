<?php

namespace PG\Blog\Models;

use Illuminate\Support\Facades\Storage;

class BlogImage extends BaseModel
{
    use Traits\BlogHasFactory;

    public function getAddressAttribute()
    {
        return Storage::url($this->path);
    }
}
