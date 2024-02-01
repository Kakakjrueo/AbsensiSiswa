<?php

namespace App\Http\Controllers;

use App\Models\Absensir;
use App\Models\Kelaser;
use App\Models\Siswar;
use App\Models\User;
use Illuminate\Http\Request;

class HakAksesController extends Controller
{
    function index()
    {
        $user = User::count();
        $kelas = Kelaser::count();
        $siswa = Siswar::count();
        $absensi = Absensir::count();
        return view('beranda',compact('user','kelas','siswa','absensi'));
    }


}
