<?php

namespace App\Http\Middleware\User;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->level == User::NORMAL) {
            return redirect()->back();
        }
        return $next($request);
    }
}
