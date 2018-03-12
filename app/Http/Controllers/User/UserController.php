<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Absence;
use App\Models\Department;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Image;
use function redirect;

class UserController extends Controller
{
    public function index()
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
        return view('users.index', $data);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(NewUserRequest $request)
    {
        User::create($request->all());
        dd($request->errors);
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $id = Auth::user()->id;
        $departments = Department::all();
        $user_roles = UserRole::where('user_id', $id)->get();
        $data = [
            'user' => $user,
            'departments' => $departments,
            'user_roles' => $user_roles,
        ];
        return view('users.show', $data);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'birthday' => $request->birthday,
        ]);
        $user->save();
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    public function rollCall()
    {
        dd(Carbon::now());
    }

    public function uploadAvatar(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(100, 100)->save(public_path('/storage/users/avatars/' . $filename));
            $avatarURL = '/storage/users/avatars/' . $filename;
        }
        $user->fill([
            'avatar' => $avatarURL,
        ]);
        $user->save();
        return redirect()->route('users.show', $user->id);
    }
}
