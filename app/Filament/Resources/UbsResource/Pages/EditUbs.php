<?php

namespace App\Filament\Resources\UbsResource\Pages;

use App\Filament\Resources\UbsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUbs extends EditRecord
{
    protected static string $resource = UbsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
