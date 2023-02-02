<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;


class CustomAuthController extends Controller
{
    public function index()
    {
        return "index";
    }

    public function login()
    {
        return View::make("user.login");
    }

    public function attempt(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required",

        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('user.dashboard')->withSuccess('Signed in');
        }
        return false;
    }

    public function register()
    {
        return View::make("user.register");
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        return redirect()->route('user.dashboard')->with("success", "User has been created");
        // return "here"
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.dashboard')->withSuccess("User has been logged out");
    }
}