<?php

namespace App\Filament\Imports;

use App\Models\Alumni;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class AlumniImporter extends Importer
{
    protected static ?string $model = Alumni::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nisn')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('nama')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('alamat')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('email')
                ->requiredMapping()
                ->rules(['required', 'email', 'max:255']),
            ImportColumn::make('no_hp')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('jurusan')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('tahun_lulus')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('status')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('profesi')
                ->rules(['max:255']),
            ImportColumn::make('jabatan')
                ->rules(['max:255']),
            ImportColumn::make('lokasi_kerja')
                ->rules(['max:255']),
            ImportColumn::make('gaji_kerja')
                ->rules(['max:255']),
            ImportColumn::make('alasan_kerja'),
            ImportColumn::make('kampus')
                ->rules(['max:255']),
            ImportColumn::make('jurusan_kuliah')
                ->rules(['max:255']),
            ImportColumn::make('lokasi_kuliah')
                ->rules(['max:255']),
            ImportColumn::make('alasan_kuliah'),
            ImportColumn::make('bidang_usaha')
                ->rules(['max:255']),
            ImportColumn::make('lokasi_wirausaha')
                ->rules(['max:255']),
            ImportColumn::make('gaji_wirausaha')
                ->rules(['max:255']),
            ImportColumn::make('alasan_wirausaha'),
            ImportColumn::make('alasan_menganggur'),
        ];
    }

    public function resolveRecord(): ?Alumni
    {
        // return Alumni::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Alumni();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your alumni import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
