<?php namespace Media101\Admin\Http\Controllers;

use App;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin::admin.home')->with('users', $users);
    }

    public function display()
    {
        $users = User::all();

        return view('admin::admin.admin')->with('users', $users);
    }

    public function postLogin()
    {
        $email = \Input::get('email');
        $password = \Input::get('password');
        $remember = \Input::get('remember');
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            return \Redirect::intended('/admin/users');
        } else {
            return \Redirect::back()->withMessage('Wrong Credentials');
        }
    }

    public function getLogin()
    {
        return view('admin::admin.auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return \Redirect::to('/');
    }

    public function wildcard()
    {
        return \Response::view('admin::admin.errors.404');
    }
}