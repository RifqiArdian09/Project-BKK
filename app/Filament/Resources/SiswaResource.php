<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Exports\SiswaExporter;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ImportAction;
use App\Filament\Imports\SiswaImporter;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ExportBulkAction;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Data Siswa';
    protected static ?string $pluralModelLabel = 'Data Siswa yang pernah bersekolah di SMK Negeri 1 Kota Bengkulu';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('nisn')
                ->required()
                ->maxLength(20),
            Forms\Components\TextInput::make('nama')
                ->required()
                ->maxLength(100),
            Forms\Components\TextInput::make('jurusan')
                ->required()
                ->maxLength(100),
        ]);
}


public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('nisn')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('nama')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('jurusan')
                ->sortable()
                ->searchable(),
        ])
        ->filters([
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                ExportBulkAction::make()->exporter(SiswaExporter::class),
                DeleteBulkAction::make(),
            ]),
        ])
        ->headerActions([
            ExportAction::make()->exporter(SiswaExporter::class)
            ->label('Export Data Siswa'),

            ImportAction::make()->importer(SiswaImporter::class)
            ->label('Import Data Siswa'),
        ]);
}


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
