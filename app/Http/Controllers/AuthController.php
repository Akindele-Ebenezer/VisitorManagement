<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login (Request $request) {
        if (
            count(User::where('email', $request->Email)
            ->where('password', $request->Password)
            ->get()) == 1
        ) {
            session()->put('Email', $request->Email);
            return redirect()->route('Dashboard');
        } else {
            return back();
        }
    }

    public function logout () {
        session()->flush(); 
        return redirect()->route('/');
    }
}
