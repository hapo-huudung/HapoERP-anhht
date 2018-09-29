<?php

namespace App\Http\Controllers\Admin;

use App\Models\ReportOT;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\User;
use App\Models\UserRole;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\NewUserRequest;

class UserController extends Controller
{

    public function showReportOTs(Request $request, $id)
    {
        if ($request) {
            $time = $request->time;
            $reportots = ReportOT::where('user_id', $id)->whereDate('starts_at', $time)->get();
        } else
        {
            $reportots = ReportOT::where('user_id', $id)->get();
        }
        foreach ($reportots as $report) {
            $report['time'] = $report->ends_at->diffInHours($report->starts_at);
        }
        $user = User::findOrFail($id);
        $data = [
            'reportots' => $reportots,
            'user' => $user,
        ];
        return view('admins.reportots.show', $data);
    }
    public function index()
    {
        $users = User::all();
        $data = [
            'users' => $users,
        ];
        return view('admins.users.index', $data);
    }

    public function create()
    {
        $id = Auth::user()->id;
        $users = User::all();
        $departments = Department::all();
        $user_roles = UserRole::where('user_id', $id)->get();
        $data = [
            'users' => $users,
            'departments' => $departments,
            'user_roles' => $user_roles,
        ];
        return view('admins.users.create', $data);
    }

    public function store(NewUserRequest $request)
    {
        User::create($request->all());
        return redirect()->route('admin.users.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $departments = Department::all();
        $user_roles = UserRole::where('user_id', $user->id)->get();
        $data = [
            'user' => $user,
            'departments' => $departments,
            'user_roles' => $user_roles,
        ];
        return view('admins.users.show', $data);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $departments = Department::all();
        $user_roles = UserRole::where('user_id', $user->id)->get();
        $data = [
            'user' => $user,
            'departments' => $departments,
            'user_roles' => $user_roles,
        ];
        return view('admins.users.edit', $data);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password'=> $request->password,
            'address' => $request->address,
            'birthday' => $request->birthday,
        ]);
        $user->save();
        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
}
