<?php

namespace Database\Seeders;

use App\Models\CarBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarBrand::insert([
            [
                'name' => 'Koenigsegg',
            ],
            [
                'name' => 'Mitsubishi',
            ],
            [
                'name' => 'Hyundai',
            ],
            [
                'name' => 'Honda',
            ],
            [
                'name' => 'Toyota',
            ],
            [
                'name' => 'Wuling',
            ],
        ]);
    }
}
