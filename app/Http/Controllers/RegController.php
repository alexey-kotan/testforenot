<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegController extends Controller
{
    public function create(){
        return view("reg");
    }

    public function store(Request $request){

        $request->validate([
            'email' =>  'required|string|email|unique:users',
            'password'=> 'required|min:8'
        ]);

        $user = User::create([
            "email" => $request->email,
            "password" => $request->password
        ]);

    Auth::login($user);

    return redirect("/user");
    }
}
