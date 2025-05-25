<?php

namespace Database\Seeders;

use App\Models\CarType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarType::insert([
            [
                'name' => 'Agera RS',
                'car_brand_id' => 1,
            ],
            [
                'name' => 'Agera One:1',
                'car_brand_id' => 1,
            ],
            [
                'name' => 'Agera R',
                'car_brand_id' => 1,
            ],
            [
                'name' => 'Agera S',
                'car_brand_id' => 1,
            ],
            [
                'name' => 'Agera',
                'car_brand_id' => 1,
            ],
            [
                'name' => 'Evo X',
                'car_brand_id' => 2,
            ],
            [
                'name' => 'Evo IX',
                'car_brand_id' => 2,
            ],
            [
                'name' => 'Evo VIII',
                'car_brand_id' => 2,
            ],
            [
                'name' => 'Evo VII',
                'car_brand_id' => 2,
            ],
            [
                'name' => 'Evo VI',
                'car_brand_id' => 2,
            ],
            [
                'name' => 'Elantra',
                'car_brand_id' => 3,
            ],
            [
                'name' => 'Tucson',
                'car_brand_id' => 3,
            ],
            [
                'name' => 'Santa Fe',
                'car_brand_id' => 3,
            ],
            [
                'name' => 'Creta',
                'car_brand_id' => 3,
            ],
            [
                'name' => 'Accord',
                'car_brand_id' => 4,
            ],
            [
                'name' => 'Civic',
                'car_brand_id' => 4,
            ],
            [
                'name' => 'CR-V',
                'car_brand_id' => 4,
            ],
            [
                'name' => 'Fit',
                'car_brand_id' => 4,
            ],
            [
                'name' => 'Camry',
                'car_brand_id' => 5,
            ],
            [
                'name' => 'Corolla',
                'car_brand_id' => 5,
            ],
            [
                'name' => 'Hilux',
                'car_brand_id' => 5,
            ],
            [
                'name' => 'Fortuner',
                'car_brand_id' => 5,
            ],
            [
                'name' => 'Cortez',
                'car_brand_id' => 6,
            ],
            [
                'name' => 'Confero',
                'car_brand_id' => 6,
            ],
            [
                'name' => 'Almaz',
                'car_brand_id' => 6,
            ],
            [
                'name' => 'E100',
                'car_brand_id' => 6,
            ],
            [
                'name' => 'E200',
                'car_brand_id' => 6,
            ],
        ]);
    }
}
