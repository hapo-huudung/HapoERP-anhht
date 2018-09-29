<?php

namespace App\Http\Controllers\Admin;

use App\Models\Absence;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AbsenceController extends Controller
{
    public function index(Request $request)
    {
        $time = Carbon::now()->format('Y-m-d');
        if ($request) {
            $time = $request->time;
        }
        $absence = Absence::whereDate('starts_at', $time)->get();
        $user_absence = Absence::whereDate('starts_at', $time)->with('user')->get();
        $users = User::all();
        $user_work = collect();
        foreach ($users as $user) {
            if (!$user_absence->contains($user)) {
                $user_work->push($user);
            }
        }
        $data = [
            'user_absence' => $user_absence,
            'user_work' => $user_work,
        ];
        return view('admins.absences.index', $data);
    }
}
