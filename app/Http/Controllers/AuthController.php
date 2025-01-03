<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginPage()
    {
        return view('Authentication.login');
    }
    public function showRegisterPage()
    {
        return view('Authentication.register');
    }
    public function doRegister(RegisterRequest $request)
    {
        $data = $request->all();
        if (Auth::check()) {
            Auth::logout();
        }
        if ($data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'username' => $data['username'],
            ]);
            auth()->login($user);
            return redirect()->route('dashboard')->with('success', ' Welcome, ' . ucfirst($user->name) . ' Your account has been successfully created.');
        }
    }

    public function doLogin(LoginRequest $request)
    {
        $data = $request->all();
        if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
            $user = User::where('id', Auth::id())->first();
            return redirect()->route('dashboard')->with('success', 'Welcome back, ' . ucfirst($user->name));
        } else {
            return back()->with('error', 'Invalid Credentials');
        }
    }
    public function logout()
    {
        Auth::logout();
        return view('Authentication.login');
    }
}
