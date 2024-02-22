<?php

namespace App\Http\Controllers;

use App\Models\Absensir;
use App\Models\Kelaser;
use App\Models\Siswar;
use App\Models\User;
use Carbon\Carbon;
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
            'name'=>'required',
            'password'=>'required'
        ],[
            'name.required'=>'Username harus diisi',
            'password.required'=>'password harus diisi'
        ]
    );
    
        $info = [
            'name'=>$request->name,
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

    function beranda()
    {
        $user = User::count();
        $kelas = Kelaser::count();
        $siswa = Siswar::count();
        $today = Carbon::today();
        $absensi = Absensir::whereDate('created_at', $today)->count();
        return view('beranda',compact('user','kelas','siswa','absensi'));
    }
}
