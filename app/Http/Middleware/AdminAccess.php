<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check()) {
            return redirect()->route('admin.login');
        }

        if (! auth()->user()->is_admin) {
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            abort(403, 'Admin access denied.');
        }

        return $next($request);
    }
}
