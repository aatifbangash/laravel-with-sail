<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomAuthRequest;
use App\Models\User;
use App\Providers\LoginHistory;
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

            /**
             * SOLID:- S means single responsibility
             * User logged-in event will send here
             * Events:- are hooks/activity of our application.
             * Listeners:- are classes which listen to events
             * NOTE:- Events and Listeners to work, must be register in the EventServiceProvider (core)
             * 
             * $ sail artisan make:event LoginHistory // create event in App/Events
             * $ sail artisan make:listener StoreLoginHistory // create listener in App/Listeners
             * $ sail artisan event:generate // it will scan the EventServiceProvider class and 
             * generate the missing events (App/Events) and listeners (App/Listeners)
             */ 
            
             event(new LoginHistory(auth()->user())); // event is used to dispatch EventObject with userObject/data
            return redirect()->route('user.dashboard')->withSuccess('Signed in');
        }
        return redirect()->back()->with("error", "failed to login");
    }

    public function register()
    {
        return View::make("user.register");
    }

    public function store(CustomAuthRequest $request)
    {

        // dd($request->validated()); // following return validated data
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        return redirect()->route('user.dashboard')->with("success", "User has been created");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.dashboard')->withSuccess("User has been logged out");
    }
}