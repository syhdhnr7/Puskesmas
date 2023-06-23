<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // jika role yang saat ini sama dengan yang diinginkan maka izinkan untuk melanjutkan ke controller
        foreach ($roles as $role) {
            if ($role == Auth::user()->role) {
                return $next($request);
            }
        }

        // jika role tidak sesuai, lembar ke halaman 403
        return abort(403);
    }
}
