<?php

namespace App\Http\Middleware\User;

use App\Models\UserRole;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckBaned
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
            if ($user->create == UserRole::FALSE && $user->delete == UserRole::FALSE) {
                return redirect()->route('users.departments', $department_id);
            }
        }
        return $next($request);
    }
}
