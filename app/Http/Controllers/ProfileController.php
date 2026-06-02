<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        
        // 1. Validasi & Fill data dasar (name, email)
        $user->fill($request->validated());

        // 2. Update Identitas (NIP/NISN/Role Type)
        if ($request->has('nip')) $user->nip = $request->input('nip');
        if ($request->has('nisn')) $user->nisn = $request->input('nisn');
        if ($request->has('role_type')) $user->role_type = $request->input('role_type');

        // 3. Logika Ganti Password (Neural Encryption Update)
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // 4. Logika Upload Foto (Avatar)
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // 5. Simpan perubahan
        $user->save();

        // 6. Refresh data user di session
        auth()->user()->refresh();

        // 7. Redirect Dinamis berdasarkan Role
        $statusMessage = '🚀 SYSTEM: DATA NEURAL BERHASIL DISINKRONISASI';
        
        if ($user->role === 'guru') {
            return redirect()->route('guru.dashboard')->with('status', 'profile-updated');
        } 
        
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('status', 'profile-updated');
        }

        return redirect()->route('dashboard')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}