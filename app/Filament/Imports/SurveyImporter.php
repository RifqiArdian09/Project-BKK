<?php

namespace App\Filament\Imports;

use App\Models\Survey;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class SurveyImporter extends Importer
{
    protected static ?string $model = Survey::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nisn')
                ->requiredMapping()
                ->rules(['required', 'max:20']),
            ImportColumn::make('nama')
                ->requiredMapping()
                ->rules(['required', 'max:100']),
            ImportColumn::make('jurusan')
                ->requiredMapping()
                ->rules(['required', 'max:50']),
            ImportColumn::make('tahun_ajaran')
                ->requiredMapping()
                ->rules(['required', 'max:20']),
            ImportColumn::make('tempat_lahir')
                ->requiredMapping()
                ->rules(['required', 'max:100']),
            ImportColumn::make('tanggal_lahir')
                ->requiredMapping()
                ->rules(['required', 'date']),
            ImportColumn::make('alamat')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('email')
                ->requiredMapping()
                ->rules(['required', 'email', 'max:255']),
            ImportColumn::make('whatsapp')
                ->requiredMapping()
                ->rules(['required', 'max:20']),
            ImportColumn::make('alasan_memilih_smk')
                ->requiredMapping()
                ->rules(['required', 'max:100']),
            ImportColumn::make('setelah_lulus')
                ->requiredMapping()
                ->rules(['required', 'max:50']),
            ImportColumn::make('kuliah')
                ->rules(['max:255']),
            ImportColumn::make('jurusan_kuliah')
                ->rules(['max:255']),
            ImportColumn::make('bidang_kerja')
                ->rules(['max:255']),
            ImportColumn::make('posisi_kerja')
                ->rules(['max:255']),
            ImportColumn::make('wirausaha')
                ->rules(['max:255']),
            ImportColumn::make('pendapat'),
            ImportColumn::make('kesan'),
            ImportColumn::make('cita_cita')
                ->rules(['max:255']),
            ImportColumn::make('pelajaran_favorit')
                ->rules(['max:255']),
        ];
    }

    public function resolveRecord(): ?Survey
    {
        // return Survey::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Survey();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your survey import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
