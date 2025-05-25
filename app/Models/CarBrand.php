<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    /** @use HasFactory<\Database\Factories\CarBrandFactory> */
    use HasFactory;

    protected $fillable = ["name"];

    public function carTypes()
    {
        return $this->hasMany(CarType::class);
    }
}
