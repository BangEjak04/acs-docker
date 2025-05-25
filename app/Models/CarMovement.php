<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMovement extends Model
{
    /** @use HasFactory<\Database\Factories\CarMovementFactory> */
    use HasFactory;

    protected $fillable = [
        'date',
        'service_type',
        'employee_id',
        'license_plate',
        'code',
        'delivery_note',
        'car_type_id',
        'chassis_number',
        'engine_number',
        'color',
        'sender',
        'sender_address',
        'recipient',
        'destination',
        'notes',
        'receipt',
        'document_notes',
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function carType()
    {
        return $this->belongsTo(CarType::class);
    }
}
