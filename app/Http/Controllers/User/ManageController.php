<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageController extends Controller
{
    //
    public function index()
    {
        return view('users.extend.user-index');
    }
    public function userShow($user)
    {
        $member=User::findOrFail($user);
        $data=[
            'member'=>$member,
        ];
        return view('users.extend.user-show', $data);
    }
}
