<?php

namespace PG\Blog\Models;

class BlogSetting extends BaseModel
{
    use Traits\BlogHasFactory,
        Scopes\SettingScope;
}
