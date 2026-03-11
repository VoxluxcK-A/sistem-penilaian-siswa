<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminSecretMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('admin_secret_logged_in')) {
            return redirect()->route('admin.secret.login');
        }

        return $next($request);
    }
}