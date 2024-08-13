<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create(){
        return view("auth");
    }

    public function store(Request $request){

        $request->validate([
            'email' =>  'required|string|email',
            'password'=> 'required|string'
        ]);

        if(Auth::attempt($request->only('email','password'))){
            return redirect()->route('user');
    }
    return back()->withInput()->withErrors('Пользователя не существует');
    }

    public function destroy(Request $request){
        Auth::logout();
        return redirect()->route('home');
    }
}