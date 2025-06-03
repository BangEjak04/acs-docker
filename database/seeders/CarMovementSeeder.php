<?php

namespace Database\Seeders;

use App\Models\CarMovement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat 50 data CarMovement menggunakan factory
        $carMovements = CarMovement::factory(50)->create();

        // Menambahkan 3 Employee ke setiap CarMovement (untuk setiap car movement)
        foreach ($carMovements as $carMovement) {
            // Menambahkan employee acak ke car movement
            $carMovement->employees()->attach(
                \App\Models\Employee::inRandomOrder()->take(3)->pluck('id')->toArray()
            );
        }
    }
}
