<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $pattern = '/admin/i'; // Pola regex untuk mencocokkan kata "admin" (tidak memperhatikan huruf besar atau kecil)

        if (auth()->check() && preg_match($pattern, auth()->user()->username)) {
            return $next($request);
        }

        // Jika bukan admin, alihkan ke halaman lain atau tampilkan pesan kesalahan
        return redirect('/')->with('error', 'Akses ditolak. Anda bukan admin.');
    }
}
