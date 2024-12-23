<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DosenResource\Pages;
use App\Models\Dosen;
use App\Models\Makul;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;

class DosenResource extends Resource
{
    protected static ?string $model = Dosen::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        // Mengecek apakah data makul ada atau tidak
        $makulOptions = Makul::query()->pluck('nama_makul', 'id');
        $hasMakulData = $makulOptions->isNotEmpty();

        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                TextInput::make('nidn')
                    ->label('NIDN')
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->unique(ignoreRecord: true),

                Select::make('kode_makul')
                    ->label('Pengampu Mata Kuliah')
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
                TextColumn::make('nama')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('nidn')
                    ->label('NIDN')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('makul.nama_makul')
                    ->label('Pengampu Mata Kuliah')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn ($state) => $state ?? 'Makul kosong'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->url(fn (Dosen $record) => route('filament.resources.dosens.edit', ['record' => $record->id])),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListDosens::route('/'),
            'create' => Pages\CreateDosen::route('/create'),
            'edit' => Pages\EditDosen::route('/{record}/edit'),
        ];
    }
}
