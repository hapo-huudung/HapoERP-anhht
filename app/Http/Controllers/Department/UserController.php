<?php

namespace App\Http\Controllers\Department;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function index($id)
    {
        echo "hi";
        $users=User::all();
        $department_users=UserRole::where('department_id',$id)->get();
        $data=[
            'users'=>$users,
            'department_users'=> $department_users,
        ];
       // dd($data);
        return view('departments.index',$data);
    }
    public function create()
    {
        echo "create";
    }

    public function update()
    {
        echo "update";
    }
    public function read()
    {
        echo "read";
    }
    public function delete()
    {
        echo "delete";
    }
    public function show()
    {
        echo "success";
    }
}
