<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // --- INTERNAL METHODS (Harus Login) ---

    public function students() {
        $users = User::where('role', 'student')->get();
        return view('users.students', compact('users'));
    }

    // TAMBAHKAN INI: Untuk internal dashboard teachers
    public function teachers() {
        $users = User::where('role', 'teacher')->get();
        return view('users.teachers', compact('users')); // Pastikan file view ini ada nanti
    }

    // TAMBAHKAN INI: Untuk internal dashboard alumni
    public function alumni() {
        $users = User::where('role', 'alumni')->get();
        return view('users.alumni', compact('users')); // Pastikan file view ini ada nanti
    }


    // --- PUBLIC METHODS (Bisa diakses tanpa login) ---

    public function publicStudents() {
        $users = User::where('role', 'student')->get();
        return view('users.public_index', ['users' => $users, 'title' => 'Siswa Aktif', 'color' => 'cyan']);
    }

    public function publicTeachers() {
        $users = User::where('role', 'teacher')->get();
        return view('users.public_index', ['users' => $users, 'title' => 'Expert Mentors', 'color' => 'purple']);
    }

    public function publicAlumni() {
        $users = User::where('role', 'alumni')->get();
        return view('users.public_index', ['users' => $users, 'title' => 'Successful Alumni', 'color' => 'yellow']);
    }
}