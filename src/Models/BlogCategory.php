<?php

namespace PG\Blog\Models;

class BlogCategory extends BaseModel
{
    use Traits\BlogHasFactory;

    public function articles()
    {
        return $this->belongsToMany(BlogArticle::class);
    }
}
