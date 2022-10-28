<?php

namespace App\Http\Middleware;

use Closure;

class Autenticado
{
    public function handle($request, Closure $next)
    {
        if(auth()->user())
            return $next($request);
        else return redirect()->route('usuarios.login');
    }
}
