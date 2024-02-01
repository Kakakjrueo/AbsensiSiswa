<?php
namespace App\Http\Controllers;

use App\Models\Absensir;
use App\Models\Kelaser;
use Illuminate\Http\Request;
class SecondController extends Controller
{
    public function filter(Request $request)
    {
        $mulai_tgl =$request->mulai;
        $akhir_tgl = $request->akhir;

        $absensirs = Absensir::whereDate('created_at', '>=', $mulai_tgl)->whereDate('created_at', '<=', $akhir_tgl)->get();

        return view('absensir.index', compact('absensirs'));
    }

    public function AbsenKelas()
    {
        $kelasers = Kelaser::all();
        return view('absensir.absenkelas',compact('kelasers'));
    }
}