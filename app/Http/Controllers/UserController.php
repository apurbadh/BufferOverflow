<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view("user.login");
    }

    public function register(){
        return view('user.register');
    }

    public function authenticate(Request $request){
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])){
            $user = User::all()->where("email", $request->email)->first();
            Auth::login($user);
            return redirect('/');
        }
        return back()->with("message", "Incorrect Credentials");

    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate(User::$rules);
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ];
        User::create($data);
        return back()->with("message", "Successfully Registered");
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        session()->flush();
        return back();
    }
}
