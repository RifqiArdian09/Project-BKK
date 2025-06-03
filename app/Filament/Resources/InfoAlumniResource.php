<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InfoAlumniResource\Pages;
use App\Models\InfoAlumni;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class InfoAlumniResource extends Resource
{
    // Konfigurasi dasar resource
    protected static ?string $model = InfoAlumni::class;
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Informasi';
    protected static ?string $navigationLabel = 'Info Alumni';
    protected static ?string $pluralModelLabel = 'Info Alumni';

    // Form untuk membuat/mengedit data
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                 // Input penulis
                 Forms\Components\TextInput::make('author')
                 ->required()
                 ->maxLength(255)
                 ->label('Penulis'),

                // Input judul
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                
                // Input subjudul
                Forms\Components\TextInput::make('subjudul')
                    ->maxLength(255)
                    ->label('Subjudul')
                    ->nullable(), 

                // Upload gambar
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
                
                // Editor deskripsi
                Forms\Components\MarkDownEditor::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                
                // Input tanggal
                Forms\Components\DatePicker::make('tanggal')
                    ->required()
                    ->label('Tanggal Publikasi')
                    ->default(now()),
                
                // Input tags
                Forms\Components\TextInput::make('tags')
                    ->maxLength(255)
                    ->label('Tags')
                    ->nullable(),
            ]);
    }

    // Tabel untuk menampilkan data
    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                
                // Kolom gambar
                Tables\Columns\ImageColumn::make('gambar')
                    ->disk('public')
                    ->label('Gambar')
                    ->width(100)
                    ->height(60)
                    ->alignment('center'),

                 // Kolom penulis (tersembunyi default)
                 Tables\Columns\TextColumn::make('author')
                 ->searchable()
                 ->label('Penulis'),
             
                
                // Kolom judul
                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap()
                    ->label('Judul'),
                
                // Kolom subjudul (tersembunyi default)
                Tables\Columns\TextColumn::make('subjudul')
                    ->searchable()
                    ->label('Subjudul'),
                
                // Kolom tanggal
                Tables\Columns\TextColumn::make('tanggal')
                    ->date('d M Y')
                    ->sortable()
                    ->label('Tanggal'),
                
                // Kolom tags
                Tables\Columns\TextColumn::make('tags')
                    ->searchable()
                    ->badge()
                    ->color('info'),
        
                // Kolom created_at (tersembunyi)
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                
                // Kolom updated_at (tersembunyi)
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('tanggal', 'desc')
            ->filters([
                // Filter berdasarkan penulis
                Tables\Filters\SelectFilter::make('author')
                    ->searchable()
                    ->options(
                        InfoAlumni::all()->pluck('author', 'author')->unique()
                    )
                    ->label('Filter Penulis'),
            ])
            ->actions([
                // Aksi lihat
                Tables\Actions\ViewAction::make()
                    ->label('')
                    ->color('info')
                    ->icon('heroicon-o-eye'),
                
                // Aksi edit
                Tables\Actions\EditAction::make()
                    ->label('')
                    ->color('warning')
                    ->icon('heroicon-o-pencil'),
                
                // Aksi hapus
                Tables\Actions\DeleteAction::make()
                    ->label('')
                    ->color('danger')
                    ->icon('heroicon-o-trash'),
            ])
            ->bulkActions([
                // Aksi massal
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                // Aksi ketika tabel kosong
                Tables\Actions\CreateAction::make(),
            ]);
    }

    // Relasi (kosong)
    public static function getRelations(): array
    {
        return [];
    }

    // Halaman yang digunakan
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInfoAlumnis::route('/'),
            'create' => Pages\CreateInfoAlumni::route('/create'),
            'edit' => Pages\EditInfoAlumni::route('/{record}/edit'),
        ];
    }
}