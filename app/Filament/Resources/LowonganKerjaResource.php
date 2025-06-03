<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LowonganKerjaResource\Pages;
use App\Models\LowonganKerja;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LowonganKerjaResource extends Resource
{
    protected static ?string $model = LowonganKerja::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Informasi';
    protected static ?string $navigationLabel = 'Info Lowongan Kerja';
    protected static ?string $pluralModelLabel = 'Info Lowongan Kerja';
    protected static ?string $modelLabel = 'Info Lowongan Kerja';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('author')
                    ->required()
                    ->maxLength(255)
                    ->label('Penulis'),

                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('posisi')
                    ->maxLength(255)
                    ->label('Posisi')
                    ->nullable(),

                    Forms\Components\FileUpload::make('gambar')
                    ->disk('public')
                    ->directory('uploads/lowongan-kerja')
                    ->preserveFilenames()
                    ->visibility('public')
                    ->image()
                    ->previewable()
                    ->openable()
                    ->downloadable()
                    ->label('Gambar'),
                

                Forms\Components\MarkdownEditor::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\DatePicker::make('tanggal_diposting')
                    ->required()
                    ->label('Tanggal Diposting')
                    ->default(now()),

                Forms\Components\DatePicker::make('tanggal_berakhir')
                    ->required()
                    ->label('Tanggal Berakhir'),

                Forms\Components\TextInput::make('tags')
                    ->maxLength(255)
                    ->label('Tags')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')
                    ->disk('public')
                    ->label('Gambar')
                    ->width(100)
                    ->height(60)
                    ->alignment('center'),

                Tables\Columns\TextColumn::make('author')
                    ->searchable()
                    ->label('Penulis'),

                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap()
                    ->label('Judul'),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(50)
                    ->searchable()
                    ->label('Deskripsi'),

                Tables\Columns\TextColumn::make('posisi')
                    ->searchable()
                    ->label('Posisi'),

                Tables\Columns\TextColumn::make('tanggal_diposting')
                    ->date('d M Y')
                    ->sortable()
                    ->label('Diposting'),

                Tables\Columns\TextColumn::make('tanggal_berakhir')
                    ->date('d M Y')
                    ->sortable()
                    ->label('Berakhir'),

                Tables\Columns\TextColumn::make('tags')
                    ->searchable()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('tanggal_diposting', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('posisi')
                    ->searchable()
                    ->options(
                        LowonganKerja::query()->pluck('posisi', 'posisi')->unique()
                    )
                    ->label('Filter Posisi'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('')
                    ->color('info')
                    ->icon('heroicon-o-eye'),

                Tables\Actions\EditAction::make()
                    ->label('')
                    ->color('warning')
                    ->icon('heroicon-o-pencil'),

                Tables\Actions\DeleteAction::make()
                    ->label('')
                    ->color('danger')
                    ->icon('heroicon-o-trash'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLowonganKerjas::route('/'),
            'create' => Pages\CreateLowonganKerja::route('/create'),
            'edit' => Pages\EditLowonganKerja::route('/{record}/edit'),
        ];
    }
}
