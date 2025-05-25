<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::factory()->create([
            'name' => 'John Doe',
            'email' => 'jhondoe@example.com',
            'phone' => '1234567890',
            'position' => 'Driver',
        ]);
        Employee::factory()->create([
            'name' => 'Ivan Mahdavikia',
            'email' => 'ivanmahdavikia@example.com',
            'phone' => '1234567890',
            'position' => 'Driver',
        ]);
    }
}
