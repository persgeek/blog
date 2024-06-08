<?php

namespace PG\Blog\Models\Traits;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

trait BlogHasFactory
{
    use HasFactory;

    protected static function newFactory()
    {
        $class = get_called_class();

        $model = Str::after($class, 'Models\\');

        $factory = Str::of($model)
            ->append('Factory')
            ->prepend('\\PG\\Blog\Factories\\')
            ->toString();

        return $factory::new();
    }
}
