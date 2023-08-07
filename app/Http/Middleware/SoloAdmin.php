<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SoloAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->fullacces=='yes'):
            return $next($request); //si es administrador redirige al HOME
        endif;
            return redirect('user'); //si es un usuario normal redirige a la ruta user

    }
}
