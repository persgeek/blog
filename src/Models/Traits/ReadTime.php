<?php

namespace PG\Blog\Models\Traits;

use Carbon\CarbonInterval;

trait ReadTime
{
    public function getReadTimeAttribute()
    {
        $words = str_word_count($this->content);

        $seconds = ($words / 3.3);

        return CarbonInterval::seconds($seconds)
            ->forHumans();
    }
}
