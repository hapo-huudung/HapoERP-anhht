<?php

namespace App\Http\Middleware\User;

use App\Models\UserRole;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckCreate
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
        $id = Auth::user()->id;
        $department_id = $request->id;
        $users = UserRole::where('user_id', $id)->where('department_id', $department_id)->get();

        foreach ($users as $user) {
            if ($user->create != 1) {
                return redirect()->back();
            }
        }
        return $next($request);
    }
}
