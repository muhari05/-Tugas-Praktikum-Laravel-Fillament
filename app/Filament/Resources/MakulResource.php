<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MakulResource\Pages;
use App\Models\Makul;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class MakulResource extends Resource
{
    protected static ?string $model = Makul::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode_makul')
                    ->required()
                    ->label('Kode Mata Kuliah'),
                Forms\Components\TextInput::make('nama_makul')
                    ->required()
                    ->label('Nama Mata Kuliah'),
                Forms\Components\TextInput::make('sks')
                    ->required()
                    ->numeric()
                    ->label('SKS'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_makul')
                    ->sortable()
                    ->searchable()
                    ->label('Kode Mata Kuliah'),
                TextColumn::make('nama_makul')
                    ->sortable()
                    ->searchable()
                    ->label('Nama Mata Kuliah'),
                TextColumn::make('sks')
                    ->sortable()
                    ->searchable()
                    ->label('SKS'),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Relasi ke resource lain jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMakuls::route('/'),
            'create' => Pages\CreateMakul::route('/create'),
            'edit' => Pages\EditMakul::route('/{record}/edit'),
        ];
    }
}
