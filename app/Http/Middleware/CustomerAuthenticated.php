<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth('customer')->check()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }
            return redirect()->route('home')->with('show_login', true);
        }

        if (! auth('customer')->user()->is_active) {
            auth('customer')->logout();
            return redirect()->route('home')->withErrors(['customer_login' => __('Your account has been deactivated.')]);
        }

        return $next($request);
    }
}
