<?php

namespace App\Http\Controllers;

use App\Models\Absensir;
use App\Models\Kelaser;
use App\Models\Siswar;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filterByKelas(Request $request)
    {
        $kelasId = $request->input('kelaser_id');
    
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

    public function OrderById(Request $request)
    {
        $kelasId = $request->input('kelaser_id');
    
        $absensirs = Absensir::where('kelaser_id', $kelasId)->get();
        $kelasers = Kelaser::all();
    
        return view('absensir.index', compact('absensirs', 'kelasers'));
    }

}
