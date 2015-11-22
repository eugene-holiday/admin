<?php

namespace Media101\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

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

    public function update($id)
    {
        $user = User::find($id);
        $user->update(Input::all());
        return redirect()->route('admin.users.index');
    }
}