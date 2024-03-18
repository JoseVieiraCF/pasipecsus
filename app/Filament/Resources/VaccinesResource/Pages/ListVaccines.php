<?php

namespace App\Filament\Resources\VaccinesResource\Pages;

use App\Filament\Resources\VaccinesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVaccines extends ListRecords
{
    protected static string $resource = VaccinesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
