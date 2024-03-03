<?php

namespace App\Http\Controllers;

use App\Models\Kelaser;
use App\Models\Siswar;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SiswarImport;

class SiswarController extends Controller
{

    public function index()
    {
        $siswars = Siswar::orderBy('kelaser_id', 'ASC')->get();
        $kelasers = Kelaser::all();
        return view('siswar.index', compact('siswars','kelasers'));
    }

   public function create()
    {
        $kelasers = Kelaser::all();
         return view('siswar.create',compact('kelasers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'=>'required',
            'jenkel'=>'required',
            'nis'=>'required|numeric|digits:9|unique:siswars',
            'kelaser_id'=>'required',
            'nisn'=>'required|numeric|digits:10|unique:siswars',
        ], [
            'nis.numeric' => 'NIS harus berupa angka.',
            'nis.digits' => 'NIS harus terdiri dari 9 digit.',
            'nis.unique' => 'NIS sudah digunakan.',
            'nisn.numeric' => 'NISN harus berupa angka.',
            'nisn.digits' => 'NISN harus terdiri dari 10 digit.',
            'nisn.unique' => 'NISN sudah digunakan.',
        ]);

        Siswar::create([
            'nama'=>$request->nama,
            'jenkel'=>$request->jenkel,
            'nis'=>$request->nis,
            'kelaser_id'=>$request->kelaser_id,
            'nisn'=> $request->nisn,
        ]);

        return redirect()->route('siswar.index')->with(['success'=> 'Data siswa berhasil ditambah']);

    }

    public function edit(string $id)
    {
        $siswar = Siswar::findOrFail($id);
        $kelasers = Kelaser::all();

        return view('siswar.edit' , compact('siswar','kelasers'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama'=>'required',
            'jenkel'=>'required',
            'nis'=>'required|numeric|digits:9|unique:siswars',
            'kelaser_id'=>'required',
            'nisn'=>'required|numeric|digits:10|unique:siswars',
        ], [
            'nis.numeric' => 'NIS harus berupa angka.',
            'nis.digits' => 'NIS harus terdiri dari 9 digit.',
            'nis.unique' => 'NIS sudah digunakan.',
            'nisn.numeric' => 'NISN harus berupa angka.',
            'nisn.digits' => 'NISN harus terdiri dari 10 digit.',
            'nisn.unique' => 'NISN sudah digunakan.',
        ]);

        $siswar = Siswar::findOrFail($id);

        $siswar->update([
            'nama'=>$request->nama,
            'jenkel'=>$request->jenkel,
            'nis'=>$request->nis,
            'nisn'=> $request->nisn,
            'kelaser_id'=>$request->kelaser_id
        ]);

        return redirect()->route('siswar.index')->with(['success'=> 'Data siswa berhasil diubah']);
    }

    public function destroy(string $id)
    {
        try {
            $siswar = Siswar::findOrFail($id);
            $siswar->delete();
            return redirect()->route('siswar.index')->with(['success' => 'Data user telah dihapus']);
        } catch (\Exception $e) {
            return redirect()->route('siswar.index')->with(['error' => 'Gagal menghapus siswa tersebut karena ada data yang terkait dengan table absensi.']);
        }
    }

    public function import(Request $request)
    {
        $this->validate($request, [
        'file' =>'required|file|mimes:xlsx,xls'
        ],[
            'file.mimes' => 'File harus berupa file excel dengan ekstensi xlsx atau xls'
        ]);
      Excel::import(new SiswarImport, $request->file('file'));
         return redirect()->back()->with(['success' =>'Import berhasil.']);

    }
}