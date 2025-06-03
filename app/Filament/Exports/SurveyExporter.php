<?php

namespace App\Filament\Exports;

use App\Models\Survey;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class SurveyExporter extends Exporter
{
    protected static ?string $model = Survey::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('nisn'),
            ExportColumn::make('nama'),
            ExportColumn::make('jurusan'),
            ExportColumn::make('tahun_ajaran'),
            ExportColumn::make('tempat_lahir'),
            ExportColumn::make('tanggal_lahir'),
            ExportColumn::make('alamat'),
            ExportColumn::make('email'),
            ExportColumn::make('whatsapp'),
            ExportColumn::make('alasan_memilih_smk'),
            ExportColumn::make('setelah_lulus'),
            ExportColumn::make('kuliah'),
            ExportColumn::make('jurusan_kuliah'),
            ExportColumn::make('bidang_kerja'),
            ExportColumn::make('posisi_kerja'),
            ExportColumn::make('wirausaha'),
            ExportColumn::make('pendapat'),
            ExportColumn::make('kesan'),
            ExportColumn::make('cita_cita'),
            ExportColumn::make('pelajaran_favorit'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your survey export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
