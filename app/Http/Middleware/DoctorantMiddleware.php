<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorantMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && !in_array(Auth::user()->usertype, ['doctorant', 'admin'])) {
            return redirect('dashboard')->with('error', 'Accès non autorisé.');
        }

        return $next($request);
    }
}