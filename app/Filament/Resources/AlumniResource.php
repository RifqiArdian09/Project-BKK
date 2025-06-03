<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumniResource\Pages;
use App\Models\Alumni;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Navigation\NavigationItem;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Actions\ImportAction;
use App\Filament\Imports\AlumniImporter;
use App\Filament\Exports\AlumniExporter; // juga pastikan ini diimpor



class AlumniResource extends Resource
{
    protected static ?string $model = Alumni::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Data Alumni';
    protected static ?string $navigationLabel = 'Data Alumni';
    protected static ?string $pluralModelLabel = 'Data Alumni';

    // Status options with consistent values
    protected static array $statusOptions = [
        'kerja' => 'Bekerja',
        'wirausaha' => 'Wirausaha',
        'kuliah' => 'Kuliah',
        'menganggur' => 'Menganggur',
    ];

    public static function getNavigationGroup(): ?string
    {
        return 'Data Alumni';
    }

    public static function getNavigationItems(): array
    {
        $items = [
            NavigationItem::make()
                ->label('Semua Alumni')
                ->group('Data Alumni')
                ->url(static::getUrl())
                ->isActiveWhen(fn () => !request()->has('status')),
        ];

        foreach (static::$statusOptions as $value => $label) {
            $items[] = NavigationItem::make($label)
                ->group('Data Alumni')
                ->url(static::getUrl() . '?status=' . $value)
                ->isActiveWhen(fn () => request('status') === $value);
        }

        return $items;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nisn')->required()->maxLength(255),
                Forms\Components\TextInput::make('nama')->required()->maxLength(255),
                Forms\Components\TextInput::make('email')->email()->required()->maxLength(255),
                Forms\Components\TextInput::make('no_hp')->required()->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options(array_combine(
                        array_keys(static::$statusOptions),
                        array_values(static::$statusOptions)
                    ))
                    ->required(),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function table(Table $table): Table
    {
        $status = request()->query('status');

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nisn')->searchable(),
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('alamat')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('no_hp')->searchable(),
                Tables\Columns\TextColumn::make('jurusan')->searchable(),
                Tables\Columns\TextColumn::make('tahun_lulus')->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Kerja' => 'success',
                        'Wirausaha' => 'warning',
                        'Kuliah' => 'info',
                        'Menganggur' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => static::$statusOptions[$state] ?? $state),
                ...match ($status) {
                    'kerja' => [
                        Tables\Columns\TextColumn::make('profesi')->searchable(),
                        Tables\Columns\TextColumn::make('jabatan')->searchable(),
                        Tables\Columns\TextColumn::make('lokasi_kerja')->searchable(),
                        Tables\Columns\TextColumn::make('gaji_kerja')
                            ->numeric()
                            ->money('IDR')
                            ->searchable(),
                        Tables\Columns\TextColumn::make('alasan_kerja')->searchable(),
                    ],
                    'kuliah' => [
                        Tables\Columns\TextColumn::make('kampus')->searchable(),
                        Tables\Columns\TextColumn::make('jurusan_kuliah')->searchable(),
                        Tables\Columns\TextColumn::make('lokasi_kuliah')->searchable(),
                        Tables\Columns\TextColumn::make('alasan_kuliah')->searchable(),
                    ],
                    'wirausaha' => [
                        Tables\Columns\TextColumn::make('bidang_usaha')->searchable(),
                        Tables\Columns\TextColumn::make('lokasi_wirausaha')->searchable(),
                        Tables\Columns\TextColumn::make('gaji_wirausaha')
                            ->numeric()
                            ->money('IDR')
                            ->searchable(),
                        Tables\Columns\TextColumn::make('alasan_wirausaha')->searchable(),
                    ],
                    'menganggur' => [
                        Tables\Columns\TextColumn::make('alasan_menganggur')->searchable(),
                    ],
                    default => [],
                },
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status Alumni')
                    ->options(static::$statusOptions),
                Tables\Filters\SelectFilter::make('jurusan')
                    ->options(fn () => Alumni::distinct('jurusan')->pluck('jurusan', 'jurusan')),
                Tables\Filters\SelectFilter::make('tahun_lulus')
                    ->options(fn () => Alumni::distinct('tahun_lulus')->pluck('tahun_lulus', 'tahun_lulus')),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make()
                        ->exporter(AlumniExporter::class),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make()->exporter(AlumniExporter::class),
                ImportAction::make()->importer(AlumniImporter::class)
            ])
            
            ->modifyQueryUsing(function (Builder $query) {
                if ($status = request()->query('status')) {
                    $query->where('status', $status);
                }
            });
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAlumnis::route('/'),
        ];
    }
}