<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\JadwalMobilResource\Pages;
use App\Models\jadwalmobil;

use Filament\Forms;
use Filament\Forms\Form;

use Filament\Resources\Resource;

use Filament\Tables;
use Filament\Tables\Table;

class JadwalMobilResource extends Resource
{
    protected static ?string $model = jadwalmobil::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationLabel = 'Jadwal Mobil';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                // MOBIL
                Forms\Components\Select::make('jenis_mobil')
                    ->label('Mobil')
                    ->options([
                        'Manual' => 'Manual',
                        'Matic' => 'Matic',
                    ])
                    ->required(),

                // TANGGAL
                Forms\Components\DatePicker::make('tanggal')
                    ->required(),

                // JAM MULAI
                Forms\Components\TimePicker::make('jam_mulai')
                    ->seconds(false)
                    ->required(),

                // JAM SELESAI
                Forms\Components\TimePicker::make('jam_selesai')
                    ->seconds(false)
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('jenis_mobil')
                    ->label('Mobil')
                    ->badge(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->date('d M Y'),

                Tables\Columns\TextColumn::make('jam_mulai')
                    ->label('Jam Mulai'),

                Tables\Columns\TextColumn::make('jam_selesai')
                    ->label('Jam Selesai'),

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
            'index' => Pages\ListJadwalMobils::route('/'),
            'create' => Pages\CreateJadwalMobil::route('/create'),
            'edit' => Pages\EditJadwalMobil::route('/{record}/edit'),
        ];
    }
}