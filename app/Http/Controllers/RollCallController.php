<?php

namespace App\Http\Controllers;

use App\Models\RollCall;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RollCallController extends Controller
{

    public function index()
    {
        $rollcall = RollCall::where('user_id', Auth::id())->whereDate('created_at', DB::raw('CURDATE()'))->get();
        if ($rollcall->isEmpty()) {
            $check = false;
        } else {
            $check = true;
        }
        $rollcalls = RollCall::orderBy('created_at', 'DESC')->paginate();
        $data = [
            'rollcalls' => $rollcalls,
            'check' => $check,
        ];
        return view('rollcalls.index', $data);
    }

    public function store(Request $request)
    {
        $rollcall = RollCall::where('user_id', Auth::id())->whereDate('created_at', DB::raw('CURDATE()'))->get();
        if (!$rollcall->isEmpty()) {
            return redirect()->route('rollcalls.index');
        }
        $now = Carbon::now();
        $rollcall = new RollCall();
        $rollcall->user_id = Auth::id();
        if (strtotime(RollCall::START_TIME) < strtotime($now)) {
            $rollcall->status = RollCall::LATE;
        } else {
            $rollcall->status = RollCall::ONTIME;
        }
        $rollcall->save();
        return redirect()->route('rollcalls.index');
    }
}
