<?php

namespace App\Http\Controllers;

use App\Models\LowonganKerja;
use Illuminate\Http\Request;

class LowonganKerjaController extends Controller
{
    // Menampilkan daftar lowongan kerja
    public function infolowongan(Request $request)
    {
        $search = $request->get('search');
        $lowongans = LowonganKerja::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")
                         ->orWhere('deskripsi', 'like', "%{$search}%");
        })
        ->orderBy('created_at', 'desc') // Urutkan berdasarkan created_at terbaru
        ->paginate(6); // Pastikan Anda menggunakan pagination

        return view('menu.infolowongan', compact('lowongans'));
    }

    // Menampilkan detail lowongan kerja
    public function show($id)
    {
        $lowongan = LowonganKerja::findOrFail($id);
        return view('menu.detail-lowongan', compact('lowongan'));
    }
}
