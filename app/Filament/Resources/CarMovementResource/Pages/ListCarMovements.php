<?php

namespace App\Filament\Resources\CarMovementResource\Pages;

use App\Filament\Resources\CarMovementResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListCarMovements extends ListRecords
{
    protected static string $resource = CarMovementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All'),
            'jkt-sby' => Tab::make('JKT-SBY')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('service_type', 'jkt-sby')),
            'towing' => Tab::make('Towing')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('service_type', 'towing')),
            'pdc-alokasi' => Tab::make('PDC Alokasi')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('service_type', 'pdc_alokasi')),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            CarMovementResource\Widgets\CarMovementOverview::class,
            CarMovementResource\Widgets\CarBrandOverview::class,
        ];
    }
}
