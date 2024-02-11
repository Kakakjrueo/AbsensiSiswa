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

    public function FilterRekap(Request $request)
    {
        $kelasers = Kelaser::all();
        $kelaser_id = $request->kelaser_id;
        $mulai = $request->mulai;
        $akhir = $request->akhir;

        $absensirs = Absensir::where('kelaser_id', $kelaser_id)
                        ->whereBetween('created_at', [$mulai, $akhir])
                        ->get();

        return view('absensir.index', compact('absensirs','kelasers'));
    }

}
