<?php

namespace PG\Blog\Models\Scopes;

trait GlobalScope
{
    public function scopeSlugOrId($query, $value)
    {
        $query->where('slug', $value)
            ->orWhere('id', $value);
    }
}
