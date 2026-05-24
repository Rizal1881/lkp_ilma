<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RiwayatResource\Pages;
use App\Models\Riwayat;

use Filament\Forms;
use Filament\Forms\Form;

use Filament\Resources\Resource;

use Filament\Tables;
use Filament\Tables\Table;

class RiwayatResource extends Resource
{
    protected static ?string $model = Riwayat::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationLabel = 'Riwayat';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('nama')
                    ->required(),

                Forms\Components\TextInput::make('paket')
                    ->required(),

                Forms\Components\DatePicker::make('tanggal')
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'selesai' => 'Selesai',
                        'proses' => 'Proses',
                    ])
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('nama'),

                Tables\Columns\TextColumn::make('paket'),

                Tables\Columns\TextColumn::make('tanggal'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'selesai',
                        'warning' => 'proses',
                    ]),

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
            'index' => Pages\ListRiwayats::route('/'),
            'create' => Pages\CreateRiwayat::route('/create'),
            'edit' => Pages\EditRiwayat::route('/{record}/edit'),
        ];
    }
}