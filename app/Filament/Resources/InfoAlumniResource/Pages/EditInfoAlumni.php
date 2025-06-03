<?php

namespace App\Filament\Resources\InfoAlumniResource\Pages;

use App\Filament\Resources\InfoAlumniResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInfoAlumni extends EditRecord
{
    protected static string $resource = InfoAlumniResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
