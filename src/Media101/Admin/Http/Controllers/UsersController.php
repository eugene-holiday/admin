<?php

namespace Media101\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin::admin.users.index')->with('users', $users);
    }
    
    public function create()
    {
        return view('admin::admin.users.create');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin::admin.users.edit', compact('user'));
    }
}