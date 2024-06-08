<?php

namespace PG\Blog\Models\Traits;

use Carbon\Carbon;

trait TimeDate
{
    public function getCreatedAtAttribute($value)
    {
        $diffForHumans = request()->header('Date-Humanize');

        if ($value && $diffForHumans) {

            return Carbon::parse($value)->diffForHumans();
        }

        return $value;
    }

    public function getUpdatedAtAttribute($value)
    {
        $diffForHumans = request()->header('Date-Humanize');

        if ($value && $diffForHumans) {

            return Carbon::parse($value)->diffForHumans();
        }

        return $value;
    }
}
