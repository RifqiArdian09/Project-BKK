<?php

namespace App\Http\Controllers;

use App\Models\InfoAlumni;
use Illuminate\Http\Request;

class InfoAlumniController extends Controller
{
    // Menampilkan daftar alumni
    public function infoalumni(Request $request)
    {
        $search = $request->get('search');
        $infoAlumni = InfoAlumni::when($search, function ($query, $search) {
                return $query->where('judul', 'like', "%{$search}%")
                             ->orWhere('deskripsi', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc') // Urutkan berdasarkan created_at terbaru
            ->paginate(6); // Menampilkan hasil pencarian dengan pagination

        return view('menu.infoalumni', compact('infoAlumni'));
    }
}