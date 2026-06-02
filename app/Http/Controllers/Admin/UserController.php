<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pendaftaran; // Buat ambil data pendaftar
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        // Ambil data pendaftar (Applicants)
        $applicants = Pendaftaran::latest()->get();
        
        // Ambil data user yang sudah jadi Guru atau Siswa
        $users = User::whereIn('role', ['teacher', 'student'])->latest()->get();

        return view('admin.dashboard', compact('applicants', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:teacher,student',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return back()->with('success', 'Neural Link Created: Akun berhasil diotorisasi!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'System Wipe: Data akun telah dihapus dari database.');
    }
}