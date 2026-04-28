<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'        => 'required|email',
            'password'     => 'required|min:6',
        ]);

        $inputLogin = $request->only('email', 'password');
        $user = User::where('email', $inputLogin['email'])->first();
        if ($user && Hash::check($inputLogin['password'], $user->password)) {
            Auth::login($user);
            // return match($user->role){
            //     'admin' => redirect('/admin'),
            //     'member' => redirect('/member'),
            //     default => redirect('/login'),
            // };
            return redirect('/home');
        }

        return back()->withErrors(['login' => 'email/password tidak sesuai']);
    }

    public function register()
    {
        return view('login.register');
    }

    public function inregister(Request $request){
        $request->validate([
            'name'      => 'required|min:6',
            'gender'    => "required",
            'email'      => "required|unique:users",
            'password'      => "required|min:6",
        ]);

        $data = [
            'name'        => $request->name,
            'gender'      => $request->gender,
            'role'        => 'member',
            'email'        => $request->email,
            'password'     => hash::make($request->password),
        ];

        User::create($data);
        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
