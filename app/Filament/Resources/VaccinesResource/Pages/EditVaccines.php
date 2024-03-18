<?php

namespace App\Filament\Resources\VaccinesResource\Pages;

use App\Filament\Resources\VaccinesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVaccines extends EditRecord
{
    protected static string $resource = VaccinesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
