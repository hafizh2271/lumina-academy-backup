<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // CEK PENJAGA: 
        // Kalau user punya grade_level dan kelasnya BUKAN XII, maka ditolak.
        // Tapi kalau grade_level kosong (karena belum buat di database), kita loloskan dulu biar kamu bisa tes.
        if ($user->grade_level && $user->grade_level !== 'XII') {
            return redirect()->route('dashboard')->with('error', 'ACCESS DENIED: Sinkronisasi hanya untuk Kelas XII Semester 2.');
        }

        
        $courses = [
            ['name' => 'UI/UX Design Masterclass', 'mentor' => 'Dr. Aris Thottle', 'progress' => 85, 'icon' => '🎨'],
            ['name' => 'Backend Engineering (Laravel)', 'mentor' => 'Eng. Taylor Otwell', 'progress' => 40, 'icon' => '⚙️'],
            ['name' => 'Advanced Cyber Security', 'mentor' => 'Kevin Mitnick', 'progress' => 10, 'icon' => '🔐'],
        ];

        return view('courses.index', compact('courses'));
    }
}