<?php

namespace App\Filament\Resources\InfoAlumniResource\Pages;

use App\Filament\Resources\InfoAlumniResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInfoAlumnis extends ListRecords
{
    protected static string $resource = InfoAlumniResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
