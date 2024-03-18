<?php

namespace App\Filament\Resources\UbsResource\Pages;

use App\Filament\Resources\UbsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUbs extends ListRecords
{
    protected static string $resource = UbsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
