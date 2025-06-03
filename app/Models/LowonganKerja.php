<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class LowonganKerja extends Model
{
    use HasFactory;

    protected $table = 'lowongan_kerja'; // Sesuaikan dengan nama tabel di database

    protected $fillable = [
        'author',
        'judul',
        'posisi',
        'deskripsi',
        'tanggal_diposting',
        'tanggal_berakhir',
        'gambar',
        'tags',
    ];
}