<?php

namespace App\Filament\Resources\CarMovementResource\Pages;

use App\Filament\Resources\CarMovementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarMovement extends EditRecord
{
    protected static string $resource = CarMovementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
