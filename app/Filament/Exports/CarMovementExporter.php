<?php

namespace App\Filament\Exports;

use App\Models\CarMovement;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class CarMovementExporter extends Exporter
{
    protected static ?string $model = CarMovement::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('date'),
            ExportColumn::make('service_type'),
            ExportColumn::make('license_plate'),
            ExportColumn::make('code'),
            ExportColumn::make('delivery_note'),
            ExportColumn::make('car_type_id'),
            ExportColumn::make('chassis_number'),
            ExportColumn::make('engine_number'),
            ExportColumn::make('color'),
            ExportColumn::make('sender'),
            ExportColumn::make('sender_address'),
            ExportColumn::make('recipient'),
            ExportColumn::make('destination'),
            ExportColumn::make('notes'),
            ExportColumn::make('receipt'),
            ExportColumn::make('document_notes'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your car movement export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
