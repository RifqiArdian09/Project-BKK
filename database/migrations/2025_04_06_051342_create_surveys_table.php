<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('survey', function (Blueprint $table) {
            $table->id();
            $table->string('nisn', 20);
            $table->string('nama', 100);
            $table->string('jurusan', 50);
            $table->string('tahun_ajaran', 20);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('email')->unique();
            $table->string('whatsapp', 20);
            $table->string('alasan_memilih_smk', 100);
            $table->string('setelah_lulus', 50);
            $table->string('kuliah')->nullable();
            $table->string('jurusan_kuliah')->nullable();
            $table->string('bidang_kerja')->nullable();
            $table->string('posisi_kerja')->nullable();
            $table->string('wirausaha')->nullable();
            $table->text('pendapat')->nullable();
            $table->text('kesan')->nullable();
            $table->string('cita_cita')->nullable();
            $table->string('pelajaran_favorit')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('survey');
    }
};
