<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Add your middleware logic here to check for admin access
        if (auth()->user() && auth()->user()->user_type === 'admin') {
            return $next($request);
        }

        // Redirect or return a response for unauthorized access
        return redirect('/'); // You can customize the redirection as needed.
    }
}
