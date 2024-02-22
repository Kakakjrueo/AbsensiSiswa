<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
            'mapel' => 'required',
        ], [
            'name.unique' => 'username sudah digunakan.',
            'email.unique' => 'email sudah digunakan.',
        ]);
        
        User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>$request->role,
            'mapel' => $request->mapel
        ]);
        return redirect()->route('user.index')->with(['success' => 'Data user berhasil ditambah']);
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit' , compact('user'));
    }

    public function update(Request $request, string $id)
{
    $user = User::findOrFail($id);

    $this->validate($request, [
        'name' => 'required|unique:users,name,' . $user->id,
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role' => 'required',
        'mapel' => 'required',
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'mapel' => $request->mapel
    ];

    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    $user->update($data);

    return redirect()->route('user.index')->with(['success' => 'Data user telah diubah']);
}

public function destroy(string $id)
{
    try {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with(['success' => 'Data user telah dihapus']);
    } catch (\Exception $e) {
        
        return redirect()->route('user.index')->with(['error' => 'Gagal menghapus user tersebut karena ada data yang terkait dengan table absensi.']);
    }
}

}
