<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!in_array($request->user()->Rol, $roles)) {
            // Redirigir si el usuario no tiene el rol adecuado
            return redirect('/home');
        }
    
        return $next($request);
    }
}
