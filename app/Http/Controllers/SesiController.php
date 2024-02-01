<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('auth.log');
    }

    function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'email harus diisi',
            'password.required'=>'password harus diisi'
        ]
    );
    
        $info = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if (Auth::attempt($info)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/beranda');
            } elseif (Auth::user()->role == 'walas') {
                return redirect('/beranda');
            } elseif (Auth::user()->role == 'guru') {
                return redirect('/beranda');
            }
        }else {
            return redirect('')->withErrors('username dan password tidak sesuai')->withInput();
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
