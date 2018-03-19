<?php

namespace App\Http\Controllers\Department;

use App\Models\Department;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    //
    public function index($id)
    {
        $user_roles=UserRole::where('user_id',Auth::id())->where('department_id',$id)->get();
        $member_roles = UserRole::where('department_id', $id)->get();
        $data = [
            'member_roles' => $member_roles,
            'user_roles' => $user_roles,
        ];
        return view('departments.index', $data);
    }

    public function select($id)
    {
        $member_roles = UserRole::withTrashed()->where('department_id', $id)->get();
        $data = [
            'member_roles' => $member_roles,
        ];
        return view('departments.select', $data);
    }

    public function create($id,$member)
    {
        $department_role = Department::findOrFail($id);
        $member = User::findOrFail($member);
        $data = [
            'member' => $member,
            'department_id' => $id,
            'department_role' => $department_role,
        ];
        return view('departments.create', $data);
    }

    public function store(Request $request, $id)
    {
        $member_id = $request->member;
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
        $member_role = new UserRole();
        $member_role->fill([
            'department_id' => $department_id,
            'user_id' => $member_id,
            'create' => $create,
            'update' => $update,
            'delete' => $delete,
            'read' => $read,
        ]);
        $member_role->save();
        return redirect()->route('users.departments', $department_id);
    }

    public function edit($id, $member)
    {
        $member_roles = UserRole::withTrashed()->where('user_id', $member)->where('department_id', $id)->get();
        $members = User::findOrFail($member);
        $data = [
            'members' => $members,
            'member_roles' => $member_roles,
        ];
        return view('departments.edit', $data);
    }

    public function update(Request $request, $id, $member)
    {
        $member_roles = UserRole::withTrashed()->where('department_id', $id)->where('user_id', $member)->get();

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
        foreach ($member_roles as $member_role) {
            $member_role->update([
                'create' => $create,
                'read' => $read,
                'update' => $update,
                'delete' => $delete,
            ]);
            $member_role->save();
        }
        return redirect()->route('users.departments', ['id' => $id]);
    }

    public function destroy($id, $member)
    {
        $member_roles = UserRole::where('user_id', $member)->where('department_id', $id)->get();
        foreach ($member_roles as $member_role) {
            $member_role->delete();
        }
        return redirect()->route('users.departments.baned', ['id' => $id]);
    }

    public function show($id, $member)
    {
        $members = User::findOrFail($member);
        $member_roles = UserRole::withTrashed()->where('user_id', $member)->where('department_id', $id)->get();
        $user_roles=UserRole::where('user_id',Auth::id())->where('department_id',$id)->get();
        $data = [
            'member' => $members,
            'member_roles' => $member_roles,
            'user_roles' => $user_roles,
        ];
        return view('departments.show', $data);
    }

    public function restore($id, $member)
    {
        $member_roles = UserRole::onlyTrashed()->where('department_id', $id)->where('user_id',$member)->get();
        foreach ($member_roles as $member_role) {
            $member_role->restore();
        }
        return redirect()->route('users.departments', ['id' => $id]);
    }
    public function baned($id)
    {
        $member_roles=UserRole::onlyTrashed()->where('department_id',$id)->get();
        $user_roles=UserRole::where('user_id',Auth::id())->where('department_id',$id)->get();
        $data=[
          'member_roles'=>$member_roles,
            'user_roles'=>$user_roles,
        ];
        return view('departments.baned',$data);
    }
}
