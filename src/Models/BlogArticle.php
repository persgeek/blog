<?php

namespace PG\Blog\Models;

class BlogArticle extends BaseModel
{
    use Traits\BlogHasFactory,
        Traits\ReadTime;

    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class);
    }

    public function images()
    {
        return $this->belongsToMany(BlogImage::class);
    }

    public function visits()
    {
        return $this->hasMany(BlogArticleVisit::class);
    }
}
