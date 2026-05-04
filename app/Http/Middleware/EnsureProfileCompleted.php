<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureProfileCompleted
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Cek apakah data user masih berupa "Data Sementara" dari hasil login WA
        if ($user->name === 'Member Baru' || str_contains($user->email, '@wa.local')) {
            
            // Arahkan ke halaman profil dengan pesan peringatan
            return redirect()->route('member.profile')->withErrors([
                'profile_incomplete' => 'Harap lengkapi Nama asli dan Email valid Anda terlebih dahulu sebelum melakukan booking kelas.'
            ]);
        }

        return $next($request);
    }
}