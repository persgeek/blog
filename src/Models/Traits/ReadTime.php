<?php

namespace PG\Blog\Models\Traits;

use Carbon\CarbonInterval;

trait ReadTime
{
    public function getReadTimeAttribute()
    {
        $listOfWords = preg_split('/[\s]+/', strip_tags($this->content));

        $countOfWords = count($listOfWords);

        $seconds = ($countOfWords / 3.3);

        return CarbonInterval::seconds($seconds)
            ->forHumans();
    }
}
