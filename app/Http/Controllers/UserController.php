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
            'name'=>'required',
            'email' => 'required',
            'password'=> 'required',
            'role' => 'required',
            'mapel' => 'required',
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
        $this->validate($request, [
            'name'=>'required',
            'email' => 'required',
            'password'=> 'required',
            'role' => 'required',
            'mapel' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name'=> $request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'password'=>bcrypt($request->password),
            'mapel' => $request->mapel
        ]);

        return redirect()->route('user.index')->with(['success' => 'Data user telah diubah']);
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with(['success' => 'Data user telah dihapus']);
    }
}
