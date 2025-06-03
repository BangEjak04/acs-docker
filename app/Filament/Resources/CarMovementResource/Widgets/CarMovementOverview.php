<?php

namespace App\Filament\Resources\CarMovementResource\Widgets;

use App\Models\CarMovement;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class CarMovementOverview extends ChartWidget
{
    protected static ?string $heading = 'Total';

    protected function getData(): array
    {
        $data = CarMovement::selectRaw('MONTH(date) as month, COUNT(*) as total')
            ->whereYear('date', now()->year) // hanya data tahun ini
            ->groupBy(DB::raw('MONTH(date)'))
            ->orderBy(DB::raw('MONTH(date)'))
            ->pluck('total', 'month');

        // Inisialisasi semua bulan dengan nilai default 0
        $monthlyData = array_fill(1, 12, 0);

        foreach ($data as $month => $total) {
            $monthlyData[$month] = $total;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Car Movement',
                    'data' => array_values($monthlyData),
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
