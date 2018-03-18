<?php

namespace App\Http\Controllers\Department;

use App\Models\Department;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function index($id)
    {
        $users = User::all();
        $department_users = UserRole::where('department_id', $id)->get();
        $data = [
            'users' => $users,
            'department_users' => $department_users,
        ];
        // dd($data);
        return view('departments.index', $data);
    }

    public function select($id)
    {
        $users = User::all();
        $department_users = UserRole::withTrashed()->where('department_id', $id)->get();
        $data = [
            'users' => $users,
            'department_users' => $department_users,
        ];
//        dd($data);
        return view('departments.select', $data);
    }

    public function create()
    {
        $user_id = request()->user;
        $department_id = \request()->id;
        $department_role = Department::findOrFail($department_id);
        $user = User::findOrFail($user_id);
        $data = [
            'user' => $user,
            'department_id' => $department_id,
            'department_role' => $department_role,
        ];
        return view('departments.create', $data);
    }

    public function store(Request $request, $id)
    {
        $user_id = $request->user;
        $department_id = $id;
        $create = UserRole::FALSE;
        $update = UserRole::FALSE;
        $read = UserRole::FALSE;
        $delete = UserRole::FALSE;
        if ($request->has('create')) {
            $create = UserRole::TRUE;
        }
        if ($request->has('read')) {
            $read = UserRole::TRUE;
        }
        if ($request->has('delete')) {
            $delete = UserRole::TRUE;
        }
        if ($request->has('update')) {
            $update = UserRole::TRUE;
        }
        $user_role = new UserRole();
        $user_role->fill([
            'department_id' => $department_id,
            'user_id' => $user_id,
            'create' => $create,
            'update' => $update,
            'delete' => $delete,
            'read' => $read,
        ]);
        $user_role->save();
        return redirect()->route('users.departments', $department_id);
    }

    public function edit($id, $user)
    {

        $user_roles = UserRole::withTrashed()->where('user_id', $user)->where('department_id', $id)->get();
        $users = User::findOrFail($user);
        $data = [
            'users' => $users,
            'user_roles' => $user_roles,
        ];
        return view('departments.edit', $data);
    }

    public function update(Request $request, $id, $user)
    {
        $user_roles = UserRole::withTrashed()->where('department_id', $id)->where('user_id', $user)->get();
        $create = UserRole::FALSE;
        $update = UserRole::FALSE;
        $read = UserRole::FALSE;
        $delete = UserRole::FALSE;
        if ($request->has('create')) {
            $create = UserRole::TRUE;
        }
        if ($request->has('read')) {
            $read = UserRole::TRUE;
        }
        if ($request->has('delete')) {
            $delete = UserRole::TRUE;
        }
        if ($request->has('update')) {
            $update = UserRole::TRUE;
        }
        foreach ($user_roles as $user_role) {
            $user_role->update([
                'create' => $create,
                'read' => $read,
                'update' => $update,
                'delete' => $delete,
            ]);
            $user_role->save();
        }
        return redirect()->route('users.departments', ['id' => $id]);
    }

    public function destroy($id, $user)
    {
        $user_roles = UserRole::where('user_id', $user)->where('department_id', $id)->get();
        foreach ($user_roles as $user_role) {
            $user_role->delete();
        }
        return redirect()->route('users.departments.baned', ['id' => $id]);
    }

    public function show($id, $user_id)
    {
        $users = User::findOrFail($user_id);
        $user_roles = UserRole::withTrashed()->where('user_id', $user_id)->where('department_id', $id)->get();

        $data = [
            'users' => $users,
            'user_roles' => $user_roles,
        ];
        return view('departments.show', $data);
    }

    public function restore($id, $user)
    {
        $user_roles = UserRole::onlyTrashed()->where('department_id', $id)->where('user_id', $user)->get();
        foreach ($user_roles as $user_role) {
            $user_role->restore();
        }
        return redirect()->route('users.departments', ['id' => $id]);
    }
    public function baned($id)
    {
        $users=User::all();
        $user_roles=UserRole::onlyTrashed()->where('department_id',$id)->get();
        $data=[
          'users'=>$users,
          'user_roles'=>$user_roles,
        ];
        return view('departments.baned',$data);
    }
}
