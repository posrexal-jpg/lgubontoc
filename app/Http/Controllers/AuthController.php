<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;
use Session;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login_show()
    {
        return view('auth.login');
    }

    public function login_perform(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $checkLoginCredentials = $request->only('email','password');
        if(Auth::attempt($checkLoginCredentials))
        {
            return redirect('admin/dashboard')->withSuccess('You are successfully loggedin.');
        }
        return redirect('login')->withSuccess('You login credentials are incorrect.');
    }

     public function register_show()
    {
        return view('auth.register');
    }
    
    public function create_user(Request $request)
    {

        $save = new User;
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->save();

        return redirect('login')->with('success', "Your account registered successfully.");
    }

    public function forgot()
    {
        return view('auth.forgot');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}