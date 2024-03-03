<?php

namespace App\Http\Controllers;
use App\Models\Absensir;
use App\Models\Kelaser;
use App\Models\Siswar;
use App\Models\User;
use Illuminate\Http\Request;

class AbsensirController extends Controller
{
    public function index()
    {
        $absensirs = Absensir::orderBy('created_at','desc')->get();
        $siswars = Siswar::all();
        $kelasers = Kelaser::all();
        $users = User::all();
        
        return view('absensir.index',compact('absensirs','siswars','kelasers','users')); 
    }

    public function create()
    {
        $siswars = Siswar::all();
        $kelasers = Kelaser::all();
        return view('absensir.create',compact('siswars','kelasers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'siswar_id' => 'required',
            'kelaser_id' => 'required',
            'keterangan' => 'required|array',
            'keterangan.*' => 'required|in:hadir,alpa,sakit,izin',
            'user_id' => 'required',
        ]);
    
        foreach ($request->keterangan as $siswar_id => $keterangan) {
            Absensir::create([
                'siswar_id' => $siswar_id,
                'keterangan' => $keterangan,
                'user_id' => $request->user_id,
                'kelaser_id' => $request->kelaser_id,
            ]);
            
        }
        return redirect()->route('absensir.index')->with(['success'=> 'Absensi siswa berhasil ditambah']);
    }

    public function edit(string $id)
    {
        $absensir = Absensir::findOrFail($id);
        $kelasers = Kelaser::all();
        $users = User::all();
        
        return view('absensir.edit', compact('absensir','kelasers','users'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'keterangan'=>'required',
        ]);

        $absensir = Absensir::findOrFail($id);

        $absensir->update([
            'user_id'=>$request->user_id,
            'keterangan'=>$request->keterangan,
        ]);
        return redirect()->route('absensir.index')->with(['success'=> 'Absensi siswa berhasil diedit']);
    }

    public function destroy(string $id)
    {
        $absensir = Absensir::findOrFail($id);

        $absensir->delete();

        return redirect()->route('absensir.index')->with(['success'=> 'Absensi siswa berhasil hapus']);
    }

    public function AbsenKelas()
    {
        $kelasers = Kelaser::all();
        return view('absensir.absenkelas',compact('kelasers'));
    }
}