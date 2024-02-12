<?php

namespace App\Http\Controllers;
use App\Models\Kelaser;
use Illuminate\Http\Request;

class KelaserController extends Controller
{
    public function index()
    {
        $kelasers = Kelaser::all();
        return view('kelaser.index', compact('kelasers'));
    }

    public function create()
    {
        return view('kelaser.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'namlas'=>'required'
        ]);

        Kelaser::create([
            'namlas'=>$request->namlas,
        ]);

        return redirect()->route('kelaser.index')->with(['success'=> 'Data kelas berhasil ditambah']);
    }

    public function edit(string $id)
    {
        $kelaser = Kelaser::findOrFail($id);
        return view('kelaser.edit' , compact('kelaser'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'namlas'=>'required',
        ]);

        $kelaser = Kelaser::findOrFail($id);

        $kelaser->update([
            'namlas'=>$request->namlas
        ]);

        return redirect()->route('kelaser.index')->with(['success'=> 'Data kelas telah diubah']);
    }

    public function destroy(string $id)
    {
        try {
            $kelaser = Kelaser::findOrFail($id);
            $kelaser->delete();
            return redirect()->route('kelaser.index')->with(['success' => 'Data user telah dihapus']);
        } catch (\Exception $e) {
            return redirect()->route('kelaser.index')->with(['error' => 'Gagal menghapus kelas tersebut karena ada data yang terkait dengan table siswa.']);
        }
    }
}
