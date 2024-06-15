<?php

namespace PG\Blog\Models;

class BlogSlider extends BaseModel
{
    use Traits\BlogHasFactory;

    public function articles()
    {
        return $this->belongsToMany(BlogArticle::class);
    }
}
