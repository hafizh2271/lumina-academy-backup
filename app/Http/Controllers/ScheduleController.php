<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule; 
use App\Models\Material; 
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function index()
    {
        // 1. Cek jika user mengakses halaman Dashboard
        if (request()->is('dashboard')) {
            // Kita ambil hari ini (format: MON, TUE, dsb)
            $hariIni = strtoupper(now()->format('D'));

            // UPGRADE: Kita ambil jadwal hari ini saja
            // Tambahkan take(5) agar tidak overload jika data banyak
            $todaySchedules = Schedule::where('day', $hariIni)
                ->orderBy('time', 'asc')
                ->take(10) 
                ->get();

            // UPGRADE: Ambil riwayat materi terbaru, batasi maksimal 5 saja
            // Ini untuk mencegah Error 500 (Maximum Execution Time)
            $moduleHistory = Material::latest()
                ->take(5)
                ->get();

            return view('dashboard', compact('todaySchedules', 'moduleHistory'));
        }

        // 2. Jika diakses dari URL /schedule, tampilkan SEMUA jadwal
        // Tetap gunakan pagination atau limit agar performa stabil
        $schedules = Schedule::orderBy('day', 'asc')
            ->orderBy('time', 'asc')
            ->get();

        return view('schedule.index', compact('schedules'));
    }
}