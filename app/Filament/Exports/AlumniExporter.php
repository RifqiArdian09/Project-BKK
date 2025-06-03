<?php

namespace App\Filament\Exports;

use App\Models\Alumni;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class AlumniExporter extends Exporter
{
    protected static ?string $model = Alumni::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('nisn'),
            ExportColumn::make('nama'),
            ExportColumn::make('alamat'),
            ExportColumn::make('email'),
            ExportColumn::make('no_hp'),
            ExportColumn::make('jurusan'),
            ExportColumn::make('tahun_lulus'),
            ExportColumn::make('status'),
            ExportColumn::make('profesi'),
            ExportColumn::make('jabatan'),
            ExportColumn::make('lokasi_kerja'),
            ExportColumn::make('gaji_kerja'),
            ExportColumn::make('alasan_kerja'),
            ExportColumn::make('kampus'),
            ExportColumn::make('jurusan_kuliah'),
            ExportColumn::make('lokasi_kuliah'),
            ExportColumn::make('alasan_kuliah'),
            ExportColumn::make('bidang_usaha'),
            ExportColumn::make('lokasi_wirausaha'),
            ExportColumn::make('gaji_wirausaha'),
            ExportColumn::make('alasan_wirausaha'),
            ExportColumn::make('alasan_menganggur'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your alumni export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
