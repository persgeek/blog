<?php

namespace PG\Blog\Models\Traits;

trait Pagination
{
    protected $minPerPage = 1;

    protected $maxPerPage = 20;

    public function getPerPage()
    {
        $perPage = request()->query('perPage');

        $perPage = max($this->minPerPage, min($this->maxPerPage, $perPage));

        return $perPage;
    }
}
