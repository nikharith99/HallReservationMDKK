<?php
// app/Http/Middleware/AdminMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{

    public function isAdmin()
    {
        // Adjust this logic based on your application's admin identification
        return Auth::check() && Auth::user()->role === 'admin';
    }

/**
 * Handle an incoming request.
 */
public function handle(Request $request, Closure $next): Response
{
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Sila log masuk sebagai admin.');
        }

        if (!$this->isAdmin()) {
            return redirect()->route('dashboard')->with('error', 'Akses ditolak. Halaman untuk admin sahaja.');
        }

        return $next($request);
    }
}
