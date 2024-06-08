# Laravel Blog
This package provides a comprehensive solution for building blog websites using the Laravel framework.

### How to install

```
composer require persgeek/blog
```

Edit `config/database.php` to ensure that all migrations are created in the correct order:

```php
'migrations' => [
    'update_date_on_publish' => false
]
```

Specify the default authentication guard in your `.env` file:

```env
AUTH_GUARD=sanctum
```

Specify the default filesystem disk in your `.env` file:

```env
FILESYSTEM_DISK=public
```

Implement the `UserContract` in your `User` model to manage user's permission:

```php
use PG\Blog\Contracts\UserContract;

class User extends Authenticatable implements UserContract
{
    public function canManageBlog()
    {
        return true;
    }
}
``` 
