<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('lowongan_kerja', function (Blueprint $table) {
        $table->string('author')->nullable()->before('judul');
    });
}

public function down()
{
    Schema::table('lowongan_kerja', function (Blueprint $table) {
        $table->dropColumn('author');
    });
}

};
