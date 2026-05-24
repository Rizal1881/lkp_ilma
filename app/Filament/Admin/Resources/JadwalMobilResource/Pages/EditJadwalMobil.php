<?php

namespace App\Filament\Admin\Resources\JadwalMobilResource\Pages;

use App\Filament\Admin\Resources\JadwalMobilResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJadwalMobil extends EditRecord
{
    protected static string $resource = JadwalMobilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
