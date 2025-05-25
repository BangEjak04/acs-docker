<?php

namespace App\Filament\Resources\CarMovementResource\Pages;

use App\Filament\Resources\CarMovementResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateCarMovement extends CreateRecord
{
    protected static string $resource = CarMovementResource::class;

    // protected int $createdCount = 0;

    // protected function handleRecordCreation(array $data): Model
    // {
    //     $datas = $data['data'];
    //     unset($data['data']);
    //     dd($datas);

    //     $models = [];

    //     foreach ($datas as $index => $data) {
    //         // dd($data);
    //         $models[] = static::getModel()::create($data);
    //     }

    //     $this->createdCount = count($datas);

    //     return static::getModel()::query()->latest()->first();
    // }

    // protected function getCreatedNotificationTitle(): ?string
    // {
    //     return "{$this->createdCount} data" . ($this->createdCount > 1 ? 's were' : ' was') . " successfully created.";
    // }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
