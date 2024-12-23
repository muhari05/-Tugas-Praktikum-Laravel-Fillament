<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MahasiswaResource\Pages;
use App\Models\Mahasiswa;
use App\Models\Makul;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        // Mengecek apakah data makul ada atau tidak
        $makulOptions = Makul::query()->pluck('nama_makul', 'id');
        $hasMakulData = $makulOptions->isNotEmpty();

        return $form
            ->schema([
                TextInput::make('nim')
                    ->label('NIM')
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('nama')
                    ->label('Nama')
                    ->required(),

                Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->placeholder('L / P')
                    ->required(),

                Select::make('jurusan')
                    ->label('Jurusan')
                    ->options([
                        'Teknik Informatika' => 'Teknik Informatika',
                        'Sistem Informasi' => 'Sistem Informasi',
                        'Ilmu Komunikasi' => 'Ilmu Komunikasi',
                        'Pariwisata' => 'Pariwisata',
                        'Hukum' => 'Hukum',
                        'Psikologi' => 'Psikologi',
                        'Teknik Sipil' => 'Teknik Sipil',
                        'Teknik Elektro' => 'Teknik Elektro',
                        'Akuntansi' => 'Akuntansi',
                        'Manajemen' => 'Manajemen',
                    ])
                    ->placeholder('Pilih Jurusan')
                    ->required(),

                Select::make('fakultas')
                    ->label('Fakultas')
                    ->options([
                        'FTIK' => 'FTIK',
                        'Teknik' => 'Teknik',
                        'Hukum' => 'Hukum',
                        'Ekonomi' => 'Ekonomi',
                    ])
                    ->placeholder('Pilih Fakultas')
                    ->required(),

                Select::make('kode_makul')
                    ->label('Pilih Mata Kuliah')
                    ->options($makulOptions)
                    ->searchable()
                    ->required($hasMakulData)
                    ->placeholder($hasMakulData ? 'Pilih Mata Kuliah' : 'Makul Kosong')
                    ->helperText($hasMakulData ? null : 'Makul belum diinputkan. Silakan tambahkan terlebih dahulu.')
                    ->disabled(!$hasMakulData),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nim')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')->sortable(),
                Tables\Columns\TextColumn::make('jurusan')->sortable(),
                Tables\Columns\TextColumn::make('fakultas')->sortable(),
                Tables\Columns\TextColumn::make('makul.nama_makul')
                    ->label('Mata Kuliah')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn ($state) => $state ?? 'Makul kosong'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMahasiswas::route('/'),
            'create' => Pages\CreateMahasiswa::route('/create'),
            'edit' => Pages\EditMahasiswa::route('/{record}/edit'),
        ];
    }
}
