<?php

namespace App\Filament\Resources\CarMovementResource\Widgets;

use App\Models\CarMovement;
use Filament\Widgets\ChartWidget;

class CarBrandOverview extends ChartWidget
{
    protected static ?string $heading = 'Brand';

    protected function getData(): array
    {
        $data = CarMovement::selectRaw('car_brands.name as brand, COUNT(*) as total')
            ->join('car_types', 'car_movements.car_type_id', '=', 'car_types.id')
            ->join('car_brands', 'car_types.car_brand_id', '=', 'car_brands.id')
            ->groupBy('car_brands.name')
            ->orderBy('total', 'desc')
            ->pluck('total', 'brand');

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Mobil per Brand',
                    'data' => array_values($data->toArray()),
                ],
            ],
            'labels' => array_keys($data->toArray()),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
