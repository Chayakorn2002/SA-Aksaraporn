<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckAccountStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->status === 'suspended') {
            auth()->logout(); // Log the user out
            return redirect()->route('login')->with('error', "Your account is suspended." . PHP_EOL . "Please contact support (093-365-4750) Thank you.");
        }

        return $next($request);
    }
}
