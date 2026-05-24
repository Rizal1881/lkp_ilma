<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\MobilResource\Pages;
use App\Models\Mobil;

use Filament\Forms;
use Filament\Forms\Form;

use Filament\Resources\Resource;

use Filament\Tables;
use Filament\Tables\Table;

class MobilResource extends Resource
{
    protected static ?string $model = Mobil::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationLabel = 'Mobil';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('jenis')
                    ->label('Mobil')
                    ->options([
                        'Manual' => 'Manual',
                        'Matic' => 'Matic',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('jumlah')
                    ->numeric()
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('jenis')
                    ->label('Mobil')
                    ->badge(),

                Tables\Columns\TextColumn::make('jumlah')
                    ->label('Jumlah'),

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
            'index' => Pages\ListMobils::route('/'),
            'create' => Pages\CreateMobil::route('/create'),
            'edit' => Pages\EditMobil::route('/{record}/edit'),
        ];
    }
}