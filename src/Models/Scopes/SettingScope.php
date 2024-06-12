<?php

namespace PG\Blog\Models\Scopes;

use PG\Blog\Enums\SettingEnum;

trait SettingScope
{
    public function scopePublic($query)
    {
        $query->whereType(SettingEnum::PUBLIC);
    }

    public function scopePrivate($query)
    {
        $query->whereType(SettingEnum::PRIVATE);
    }
}
