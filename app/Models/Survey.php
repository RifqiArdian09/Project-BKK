<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $table = 'survey'; // Sesuaikan dengan nama tabel di database

    protected $fillable = [
        'nisn', 'nama', 'jurusan', 'tahun_ajaran', 'tempat_lahir',
        'tanggal_lahir', 'alamat', 'email', 'whatsapp', 'alasan_memilih_smk',
        'setelah_lulus', 'kuliah', 'jurusan_kuliah', 'bidang_kerja',
        'posisi_kerja', 'wirausaha', 'pendapat', 'kesan', 'cita_cita', 'pelajaran_favorit',
    ];

    public $timestamps = true; // Menambahkan timestamps
}
