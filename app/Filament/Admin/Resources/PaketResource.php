<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PaketResource\Pages;
use App\Models\Paket;

use Filament\Forms;
use Filament\Forms\Form;

use Filament\Resources\Resource;

use Filament\Tables;
use Filament\Tables\Table;

class PaketResource extends Resource
{
    protected static ?string $model = Paket::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationLabel = 'Paket';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('nama_paket')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('harga')
                    ->numeric()
                    ->required(),

                Forms\Components\Textarea::make('deskripsi')
                    ->rows(4),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('nama_paket')
                    ->searchable(),

                Tables\Columns\TextColumn::make('harga')
                    ->money('IDR'),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(40),

            ])

            ->filters([
                //
            ])

            ->actions([

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])

            ->bulkActions([

                Tables\Actions\BulkActionGroup::make([

                    Tables\Actions\DeleteBulkAction::make(),

                ]),

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPakets::route('/'),
            'create' => Pages\CreatePaket::route('/create'),
            'edit' => Pages\EditPaket::route('/{record}/edit'),
        ];
    }
}