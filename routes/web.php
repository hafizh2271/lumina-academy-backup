<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController, ScheduleController, CourseController, 
    DirectoryController, UserController
};
use App\Http\Controllers\Teacher\{MaterialController, AttendanceController};
use App\Models\{Pendaftaran, Material, Schedule, User};
use Illuminate\Http\Request;

// ==========================================
// 1. PUBLIC ROUTES
// ==========================================
Route::get('/', function () { 
    $publicUsers = User::whereIn('role', ['guru', 'student', 'siswa'])->latest()->take(3)->get();
    return view('landing', compact('publicUsers')); 
});

Route::prefix('explore')->group(function () {
    Route::get('/about', function () { return view('public.about'); })->name('public.about');
    Route::get('/vision-mission', function () { return view('public.vision'); })->name('public.vision');
    
    Route::get('/structure', function () {
        $teachers = User::where('role', 'guru')->get();
        $students = User::whereIn('role', ['student', 'siswa'])->get();
        return view('public.structure', compact('teachers', 'students'));
    })->name('public.structure');
});

Route::prefix('ppdb')->group(function () {
    Route::get('/', function () { return view('public.ppdb'); })->name('public.ppdb');
    Route::post('/store', function (Request $request) {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'asal_sekolah' => 'required|string',
            'major' => 'required',
            'pesan' => 'nullable|string|min:10',
        ]);
        Pendaftaran::create($validated);
        return view('public.success'); 
    })->name('ppdb.store');
});

// ==========================================
// 2. INTERNAL SYSTEM (Harus Login)
// ==========================================
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->role === 'guru') return redirect()->route('guru.dashboard');
        if ($user->role === 'admin') return redirect()->route('admin.dashboard');

        $hariIni = strtoupper(now()->format('D')); 
        $todaySchedules = Schedule::where('day', $hariIni)->get();
        $moduleHistory = Material::latest()->take(5)->get();
        return view('dashboard', compact('todaySchedules', 'moduleHistory'));
    })->name('dashboard');

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            if (auth()->user()->role !== 'admin') abort(403);
            $applicants = Pendaftaran::latest()->get();
            $users = User::whereIn('role', ['guru', 'student', 'siswa', 'admin'])->latest()->get();
            return view('admin.dashboard', compact('applicants', 'users'));
        })->name('admin.dashboard');

        Route::post('/users/store', function (Request $request) {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'role' => 'required'
            ]);
            $data['password'] = bcrypt($data['password']);
            User::create($data);
            return back()->with('success', 'Neural Link Created!');
        })->name('admin.users.store');

        Route::delete('/users/{id}', function ($id) {
            User::findOrFail($id)->delete();
            return back()->with('success', 'Identity Wiped!');
        })->name('admin.users.destroy');
    });

    Route::prefix('guru')->group(function () {
        Route::get('/dashboard', function () {
            if (auth()->user()->role !== 'guru') abort(403);
            $materials = Material::where('user_id', auth()->id())->latest()->get();
            return view('guru.dashboard', compact('materials'));
        })->name('guru.dashboard');

        Route::resource('materials', MaterialController::class)->names([
            'index' => 'teacher.materials.index',
            'create' => 'teacher.materials.create',
            'store' => 'teacher.materials.store',
            'show' => 'teacher.materials.show',
            'edit' => 'teacher.materials.edit',
            'update' => 'teacher.materials.update',
            'destroy' => 'teacher.materials.destroy',
        ]);
        
        Route::get('/attendance/scan', [AttendanceController::class, 'scanner'])->name('teacher.attendance.scan');
        Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('teacher.attendance.store');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::get('/directory', [DirectoryController::class, 'index'])->name('directory.index');
});

require __DIR__.'/auth.php';