<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class FormSurveyController extends Controller
{
    public function formsurvey()
    {
        return view('menu.formsurvey');
    }

    public function checkNisnExists(Request $request)
    {
        $exists = Survey::where('nisn', $request->nisn)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nisn' => 'required|unique:survey,nisn',
            'nama' => 'required',
            'jurusan' => 'required',
            'tahun_ajaran' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'email' => 'required|email|unique:survey,email',
            'whatsapp' => 'required',
            'alasan_memilih_smk' => 'required',
            'setelah_lulus' => 'required',
            'kuliah' => 'nullable|string',
            'jurusan_kuliah' => 'nullable|string',
            'bidang_kerja' => 'nullable|string',
            'posisi_kerja' => 'nullable|string',
            'wirausaha' => 'nullable|string',
            'pendapat' => 'required',
            'kesan' => 'required',
            'cita_cita' => 'required',
            'pelajaran_favorit' => 'required',
        ]);

        

        try {
            Survey::create($validatedData);
            
            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data survey berhasil dikirim! Terima kasih atas partisipasi Anda.'
                ]);
            }
            
            return redirect()->route('components.menu')->with('success', 'Data survey berhasil dikirim! Terima kasih atas partisipasi Anda.');
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