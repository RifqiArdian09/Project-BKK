<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa; 
use Illuminate\Support\Facades\Validator;


class AlumniController extends Controller
{
    public function verifyNisn(Request $request)
{
    $nisn = $request->query('nisn');
    
    $student = Siswa::where('nisn', $nisn)->first();
    
    if (!$student) {
        return response()->json([
            'success' => false,
            'message' => 'NISN tidak ditemukan dalam database'
        ]);
    }
    
    return response()->json([
        'success' => true,
        'student' => [
            'nisn' => $student->nisn,
            'nama' => $student->nama,
            'jurusan' => $student->jurusan
        ]
    ]);
}
}
