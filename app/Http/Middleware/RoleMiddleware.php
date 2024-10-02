<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect('/login'); // Arahkan ke login jika belum login
        }

        // Dapatkan peran pengguna saat ini
        $user = Auth::user();

        // Cek apakah pengguna memiliki peran yang diizinkan
        if (!in_array($user->role, $roles)) {
            return redirect('/unauthorized'); // Arahkan ke halaman unauthorized jika tidak diizinkan
        }

        // Lanjutkan permintaan jika peran sesuai
        return $next($request);
    }
}
