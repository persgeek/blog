<?php

namespace PG\Blog\Tests\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use PG\Blog\Contracts\UserContract;

class User extends Authenticatable implements UserContract
{
    public function canManageBlog()
    {
        return true;
    }
}
