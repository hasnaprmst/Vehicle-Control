<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = UserModel::all();
        return view('laravel-examples.users-management', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'role' => 'required',
        ]);

        $defaultPassword = bcrypt('12345');

        UserModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $defaultPassword,
            'role' => $request->role,
        ]);
        
        if ($request) {
            return redirect('users')->with(['success' => 'Data berhasil disimpan']);
        } else {
            return redirect('users')->with(['error' => 'Data gagal disimpan']);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);

        $user = UserModel::find($id);
        dd($user, $request->all());
        $user->update($request->all());

        if ($user) {
            return redirect('users')->with(['success' => 'Data berhasil diupdate']);
        } else {
            return redirect('users')->with(['error' => 'Data gagal diupdate']);
        }
    }

    public function destroy($id)
    {
        $user = UserModel::find($id);
        if ($user) {
            $user->delete();
            return redirect('users')->with('success', 'User deleted successfully');
        } else {
            return redirect('users')->with('error', 'User not found');
        }
    }
}
