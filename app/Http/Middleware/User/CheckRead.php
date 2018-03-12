<?php

namespace App\Http\Middleware\User;

use Closure;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;

class CheckRead
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
        $id = Auth::user()->id;
        $department_id = $request->id;
        $users = UserRole::where('user_id', $id)->where('department_id', $department_id)->get();

        foreach ($users as $user) {
            if ($user->read != 1) {
                return redirect()->back();
            }
        }
        return $next($request);
    }
}
