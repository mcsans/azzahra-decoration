<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() && request()->routeIs('home') || request()->routeIs('customer.about') || request()->routeIs('customer.shop') || request()->routeIs('customer.shop-category')) {
            return $next($request);
        };

        if (Auth::check() && Auth::user()->role->name === 'CUSTOMER') {
            return $next($request);
        }

        return redirect()->route('dashboard');
    }
}
