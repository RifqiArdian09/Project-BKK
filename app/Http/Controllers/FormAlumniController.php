<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\DB;

class FormAlumniController extends Controller
{
    public function formalumni()
    {
        return view('menu.formalumni');
    }

    public function checkNisnExists(Request $request)
    {
        $exists = Alumni::where('nisn', $request->nisn)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nisn' => 'required|unique:alumnis',
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:alumnis',
            'no_hp' => 'required',
            'jurusan' => 'required',
            'tahun_lulus' => 'required',
            'status' => 'required',
            'profesi' => 'nullable',
            'jabatan' => 'nullable',
            'lokasi_kerja' => 'nullable',
            'gaji_kerja' => 'nullable',
            'alasan_kerja' => 'nullable',
            'kampus' => 'nullable',
            'jurusan_kuliah' => 'nullable',
            'lokasi_kuliah' => 'nullable',
            'alasan_kuliah' => 'nullable',
            'bidang_usaha' => 'nullable',
            'lokasi_wirausaha' => 'nullable',
            'gaji_wirausaha' => 'nullable',
            'alasan_wirausaha' => 'nullable',
            'alasan_menganggur' => 'nullable',
        ]);

        try {
            Alumni::create($validatedData);
            
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Anda berhasil dikirim! Terima kasih atas partisipasi Anda.'
                ]);
            }
            
            return redirect()->route('components.menu')->with('success', 'Data Alumni berhasil dikirim! Terima kasih atas partisipasi Anda.');
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage()
                ], 500);
            }
            
            return back()->withErrors(['message' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }
}