<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$level): Response
    {
        $user = $request->user();

        // Periksa apakah pengguna ada dan level ID-nya ada dalam daftar yang diizinkan
        if ($user && in_array($user->level_id, $level)) {
            return $next($request);
        }

        // Jika tidak sesuai, kembalikan pengguna ke halaman sebelumnya atau halaman yang sesuai
        return redirect('hak_akses');
    }
}
