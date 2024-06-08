<?php

namespace PG\Blog\Http\Backend\Middleware;

use Illuminate\Auth\AuthenticationException;

class CanManageBlog
{
    public function handle($request, $next)
    {
        $user = $request->user();

        if (!$user) {
            throw new AuthenticationException;
        }

        $canManage = $user->canManageBlog();

        if (!$canManage) {
            throw new AuthenticationException;
        }

        return $next($request);
    }
}
