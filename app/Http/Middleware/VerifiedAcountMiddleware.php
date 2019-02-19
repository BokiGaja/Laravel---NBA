<?php

namespace App\Http\Middleware;

use Closure;

class VerifiedAcountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->email_verified_at)
        {
            auth()->logout();
            session()->flash('message', 'You have to verify your account first. Check your email');
            return redirect()->route('show-login');
        }
        return $next($request);
    }
}
