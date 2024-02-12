<?php

namespace App\Http\Controllers;

use App\Models\Absensir;
use App\Models\Kelaser;
use App\Models\Siswar;
use App\Models\User;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filterByKelas(Request $request)
    {
        $kelasId = $request->input('kelaser_id');
         session()->put('kelaser_id', $kelasId);
    
        $siswars = Siswar::where('kelaser_id', $kelasId)->get();
        $kelasers = Kelaser::all();
    
        return view('siswar.index', compact('siswars', 'kelasers'));
    }
    
    public function PilihKelas(Request $request)
    {
        $kelasId = $request->input('kelaser_id');
    
        $siswars = Siswar::where('kelaser_id', $kelasId)->get();
        $kelasers = Kelaser::all();
    
        return view('absensir.create', compact('siswars', 'kelasers'));
    }

    public function FilterRekap(Request $request)
    {
    $request->validate([
        'kelaser_id' => 'required',
        'mulai' => 'required',
        'akhir' => 'required',
    ]);
    $user_id = $request->user_id;
    session()->put('user_id', $user_id);
    $kelaser_id = $request->kelaser_id;
    session()->put('kelaser_id', $kelaser_id);
    $mulai = $request->mulai;
    $akhir = $request->akhir;

    $absensirs = Absensir::where('user_id', $user_id)
                         ->where('kelaser_id', $kelaser_id)
                         ->whereDate('created_at', '>=', $mulai)
                         ->whereDate('created_at', '<=', $akhir)
                         ->get();
    $kelasers = Kelaser::all();
    $users = User::all();
    return view('absensir.index', compact('absensirs','kelasers','users'));
    }

}
