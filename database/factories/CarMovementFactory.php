<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarMovement>
 */
class CarMovementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeThisDecade(), // Tanggal
            'service_type' => $this->faker->word(), // Jenis Layanan
            'license_plate' => $this->faker->optional()->regexify('[A-Z]{1,2}[0-9]{1,4}[A-Z]{1,3}'), // Nopol
            'code' => $this->faker->optional()->word(), // Kode
            'delivery_note' => $this->faker->uuid(), // SJ (Surat Jalan)
            'car_type_id' => \App\Models\CarType::inRandomOrder()->first()->id, // ID Mobil
            'chassis_number' => $this->faker->word(), // Rangka
            'engine_number' => $this->faker->optional()->word(), // Nosin
            'color' => $this->faker->safeColorName(), // Warna
            'sender' => $this->faker->name(), // Pengirim
            'sender_address' => $this->faker->address(), // Alamat Pengirim
            'recipient' => $this->faker->name(), // Penerima
            'destination' => $this->faker->city(), // Tujuan
            'notes' => $this->faker->optional()->sentence(), // Keterangan
            'receipt' => $this->faker->optional()->word(), // Kwitansi
            'document_notes' => $this->faker->optional()->sentence(), // Keterangan Surat
        ];
    }
}
