<?php

namespace App\Http\Middleware;

use App\Models\UserRole;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckDepartment
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
        $department_id = $request->id;
        $check = 0;
        $user_id = Auth::user()->id;
        $results = UserRole::where('user_id', $user_id)->where('department_id', $department_id)->get();
        foreach ($results as $result) {
            if ($result->deleted != null) $check = 1;
        }
        if ($results->count() == 0 || $check == 1) {
            return redirect()->back();
        }
        return $next($request);
    }
}
