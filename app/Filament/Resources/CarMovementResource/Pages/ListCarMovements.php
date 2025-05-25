<?php

namespace App\Filament\Resources\CarMovementResource\Pages;

use App\Filament\Resources\CarMovementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarMovements extends ListRecords
{
    protected static string $resource = CarMovementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
