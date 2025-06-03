<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarMovementResource\Pages;
use App\Filament\Resources\CarMovementResource\RelationManagers;
use App\Models\CarMovement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class CarMovementResource extends Resource
{
    protected static ?string $model = CarMovement::class;

    protected static ?string $navigationIcon = 'heroicon-s-truck';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->default(now())
                    ->required(),
                Forms\Components\Select::make('service_type')
                    ->label('Service Type')
                    ->options([
                        'jkt-sby' => 'JKT-SBY',
                        'towing' => 'Towing',
                        'pdc_alokasi' => 'PDC Alokasi',
                    ])
                    ->live()
                    ->required(),
                Forms\Components\Select::make('employee_id')
                    ->label('Employee')
                    ->relationship('employees', 'name')
                    ->getOptionLabelFromRecordUsing(fn($record) => "{$record->name}")
                    ->preload()
                    ->searchable()
                    ->multiple()
                    ->required(),
                Forms\Components\TextInput::make('license_plate')
                    ->label('License Plate'),
                Forms\Components\TextInput::make('code')
                    ->label('Code')
                    ->required(fn(Get $get): bool => $get('service_type') !== 'pdc_alokasi')
                    ->visible(fn(Get $get): bool => filled($get('service_type')) && $get('service_type') !== 'pdc_alokasi'),
                Forms\Components\TextInput::make('delivery_note')
                    ->label('Delivery Note'),
                Forms\Components\Select::make('car_type_id')
                    ->label('Car')
                    ->relationship('carType', 'name')
                    ->getOptionLabelFromRecordUsing(fn($record) => "{$record->name} ({$record->carBrand->name})")
                    ->createOptionForm([
                        Forms\Components\Select::make('car_brand_id')
                            ->label('Car Brand')
                            ->relationship('carBrand', 'name')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Brand Name')
                                    ->required(),
                            ])
                            ->preload()
                            ->searchable()
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->label('Car Type')
                            ->required(),
                    ])
                    ->preload()
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('chassis_number')
                    ->label('Chassis Number'),
                Forms\Components\TextInput::make('engine_number')
                    ->label('Engine Number'),
                Forms\Components\TextInput::make('color')
                    ->label('Color'),
                Forms\Components\TextInput::make('sender')
                    ->label('Sender'),
                Forms\Components\TextInput::make('sender_address')
                    ->label('Sender Address'),
                Forms\Components\TextInput::make('recipient')
                    ->label('Recipient'),
                Forms\Components\TextInput::make('destination')
                    ->label('Destination'),
                Forms\Components\TextInput::make('notes')
                    ->label('Notes'),
                Forms\Components\TextInput::make('receipt')
                    ->label('Receipt'),
                Forms\Components\TextInput::make('document_notes')
                    ->label('Document Notes'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date('d M Y')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('employees.name')
                    ->label('Employee')
                    ->listWithLineBreaks()
                    ->badge()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('license_plate')
                    ->label('License Plate')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('delivery_note')
                    ->label('Delivery Note')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('carType')
                    ->label('Car')
                    ->formatStateUsing(fn($state, $record): string => __("{$record->carType->name} ({$record->carType->carBrand->name})"))
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('chassis_number')
                    ->label('Chassis Number')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('engine_number')
                    ->label('Engine Number')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('code')
                    ->label('Code')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('color')
                    ->label('Color')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('sender')
                    ->label('Sender')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('sender_address')
                    ->label('Sender Address')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('recipient')
                    ->label('Recipient')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('destination')
                    ->label('Destination')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('notes')
                    ->label('Notes')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('receipt')
                    ->label('Receipt')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('document_notes')
                    ->label('Document Notes')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                ExportAction::make()->exports([
                    ExcelExport::make()
                        ->fromTable()
                        ->askForWriterType()
                        ->withFilename(date('Ymd') . '_CarMovements')
                ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('Year')
                    ->options(function () {
                        return \App\Models\CarMovement::selectRaw('YEAR(date) as year')
                            ->distinct()
                            ->orderBy('year', 'desc')
                            ->pluck('year', 'year')
                            ->toArray();
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()->exports([
                        ExcelExport::make()
                            ->fromTable()
                            ->askForWriterType()
                            ->withFilename(date('Ymd') . '_CarMovements')
                    ]),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCarMovements::route('/'),
            'create' => Pages\CreateCarMovement::route('/create'),
            'edit' => Pages\EditCarMovement::route('/{record}/edit'),
        ];
    }
}
