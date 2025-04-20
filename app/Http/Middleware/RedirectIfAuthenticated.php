<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guard = $guards[0] ?? null;

        if (Auth::guard($guard)->check()) {
            $user = Auth::user();

            if ($user->role === 'siswa') {
                return redirect('/upload-tugas');
            } elseif ($user->role === 'guru') {
                return redirect('/dashboard');
            }

            // fallback redirect kalau role tidak cocok
            return redirect('/');
        }

        return $next($request);
    }
}
