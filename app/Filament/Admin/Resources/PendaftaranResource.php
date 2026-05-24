<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PendaftaranResource\Pages;
use App\Models\Pendaftaran;

use Filament\Forms;
use Filament\Forms\Form;

use Filament\Resources\Resource;

use Filament\Tables;
use Filament\Tables\Table;

class PendaftaranResource extends Resource
{
    protected static ?string $model = Pendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?string $navigationLabel = 'Pendaftaran';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('nama')
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),

                Forms\Components\TextInput::make('no_hp')
                    ->required(),

                Forms\Components\Select::make('jenis_mobil')
                    ->options([
                        'manual' => 'Manual',
                        'matic' => 'Matic',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('paket')
                    ->required(),

                Forms\Components\Select::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'success' => 'Lunas',
                        'failed' => 'Gagal',
                    ])
                    ->required()
                    ->label('Status Pembayaran'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email'),

                Tables\Columns\TextColumn::make('no_hp'),

                Tables\Columns\TextColumn::make('jenis_mobil'),

                Tables\Columns\BadgeColumn::make('payment_status')
                    ->label('Pembayaran')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'success',
                        'danger' => 'failed',
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
            'index' => Pages\ListPendaftarans::route('/'),
            'create' => Pages\CreatePendaftaran::route('/create'),
            'edit' => Pages\EditPendaftaran::route('/{record}/edit'),
        ];
    }
}