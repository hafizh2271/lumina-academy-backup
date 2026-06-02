<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MaterialController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'subject' => 'required|string',
            'file' => 'required|file|mimes:pdf,zip,rar,docx,doc|max:20480',
        ]);

        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('materials', $fileName, 'public');

                Material::create([
                    'title' => $request->title,
                    'subject' => $request->subject,
                    'file_path' => $path,
                    'user_id' => Auth::id(),
                ]);

                return redirect()->route('guru.dashboard')->with('success', 'Uplink Berhasil: Modul telah diarsipkan.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Kegagalan Sistem: Terjadi interupsi pada jalur unggah.');
        }

        return back()->with('error', 'Peringatan: Tidak ada file terdeteksi.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Cari data milik user yang sedang login
        $materi = Material::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        
        // Pastikan path view sesuai folder lu: teacher/materi/edit.blade.php
        return view('teacher.materi.edit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $materi = Material::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        
        $request->validate([
            'title' => 'required|string|max:100',
            'subject' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,zip,rar,docx,doc|max:20480',
        ]);

        $data = [
            'title' => $request->title,
            'subject' => $request->subject,
        ];

        if ($request->hasFile('file')) {
            // Hapus file lama dari storage jika user upload file baru
            if ($materi->file_path && Storage::disk('public')->exists($materi->file_path)) {
                Storage::disk('public')->delete($materi->file_path);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $data['file_path'] = $file->storeAs('materials', $fileName, 'public');
        }

        // Update database
        $materi->update($data);

        return redirect()->route('guru.dashboard')->with('success', 'Data Re-Synchronized: Modul berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $materi = Material::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        try {
            // Hapus file fisik di storage
            if ($materi->file_path && Storage::disk('public')->exists($materi->file_path)) {
                Storage::disk('public')->delete($materi->file_path);
            }

            // Hapus record di database
            $materi->delete();

            return back()->with('success', 'Data Terhapus: Modul telah ditarik dari server.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal: Protokol penghapusan gagal dieksekusi.');
        }
    }
}