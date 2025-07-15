<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle(Request $request, Closure $next): Response
{
    // Haddii user aan login ahayn
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    // Haddii user login yahay laakiin aanu ahayn admin
    if (!in_array(auth()->user()->role, ['admin'])) {
        return redirect()->route('home');
        // ama: abort(403, 'Unauthorized');
    }

    return $next($request);
}

}
