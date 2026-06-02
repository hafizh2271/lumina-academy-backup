<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance; // Pastikan lu dah punya model ini
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function scanner() {
        return view('teacher.attendance.scan');
    }

    public function store(Request $request) {
        $student = User::where('id', $request->student_id)->where('role', 'siswa')->first();

        if (!$student) {
            return response()->json(['success' => false, 'message' => 'Siswa tidak terdaftar di database.']);
        }

        // Cek apakah sudah absen hari ini
        $alreadyPresent = Attendance::where('user_id', $student->id)
                                    ->whereDate('created_at', now()->toDateString())
                                    ->exists();

        if ($alreadyPresent) {
            return response()->json(['success' => false, 'message' => $student->name . ' sudah absen hari ini.']);
        }

        // Simpan Absensi
        Attendance::create([
            'user_id' => $student->id,
            'teacher_id' => Auth::id(),
            'status' => 'hadir'
        ]);

        return response()->json(['success' => true, 'message' => 'Absensi ' . $student->name . ' berhasil dicatat!']);
    }
}