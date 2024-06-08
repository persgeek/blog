<?php

namespace PG\Blog\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use Scopes\GlobalScope,
        Traits\TimeDate;

    protected $guarded = [];
}
