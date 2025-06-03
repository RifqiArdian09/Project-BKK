<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SurveyResource\Pages;
use App\Filament\Resources\SurveyResource\RelationManagers;
use App\Models\Survey;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Exports\SurveyExporter;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ImportAction;
use App\Filament\Imports\SurveyImporter;
use Filament\Tables\Actions\DeleteBulkAction;

class SurveyResource extends Resource
{
    protected static ?string $model = Survey::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Survey Siswa';
    protected static ?string $pluralModelLabel = 'Survey Siswa';
    protected static ?string $modelLabel = 'Data Survey Siswa';

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
                    ->maxLength(50),
                Forms\Components\TextInput::make('tahun_ajaran')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('tempat_lahir')
                    ->required()
                    ->maxLength(100),
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->required(),
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('whatsapp')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('alasan_memilih_smk')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('setelah_lulus')
                    ->tel()
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('kuliah')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('jurusan_kuliah')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('bidang_kerja')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('posisi_kerja')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('wirausaha')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('pendapat')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('kesan')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('cita_cita')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('pelajaran_favorit')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nisn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jurusan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahun_ajaran')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempat_lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alasan_memilih_smk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('setelah_lulus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kuliah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jurusan_kuliah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bidang_kerja')
                    ->searchable(),
                Tables\Columns\TextColumn::make('posisi_kerja')
                    ->searchable(),
                Tables\Columns\TextColumn::make('wirausaha')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cita_cita')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pelajaran_favorit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
               
                Tables\Actions\DeleteAction::make()
                    ->modalHeading('Hapus Data Alumni')
                    ->modalSubheading('Apakah Anda yakin ingin menghapus Survey ini?')
                    ->modalButton('Hapus')
                    ->successNotificationTitle('Data survey berhasil dihapus.')
                    ->color('danger'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ExportBulkAction::make()
                        ->exporter(SurveyExporter::class),
                ]),
            ])
            ->headerActions([
                ExportAction::make()->exporter(SurveyExporter::class),
                ImportAction::make()->importer(SurveyImporter::class),
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
            'index' => Pages\ListSurveys::route('/'),
        ];
    }
}
