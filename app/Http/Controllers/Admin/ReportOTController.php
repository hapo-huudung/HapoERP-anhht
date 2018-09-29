<?php

namespace App\Http\Controllers\Admin;

use App\Models\ReportOT;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ReportOTController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $time = Carbon::parse($request->time)->format('Y-m-d');
            $users = User::join('report_o_ts', 'user_id', 'users.id')->whereDate('report_o_ts.starts_at', $time)->get();
        } else {
            $users = User::join('report_o_ts', 'user_id', 'users.id')->get();
        }
        $data = [
            'users' => $users,
        ];
        return view('admins.reportots.index', $data);
    }
}
