<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_movements', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // TANGGAL
            $table->string('service_type'); // JENIS LAYANAN
            $table->string('license_plate')->nullable(); // NOPOL
            $table->string('code')->nullable(); // KODE
            $table->string('delivery_note'); // SJ
            $table->foreignIdFor(\App\Models\CarType::class); // MOBIL
            $table->string('chassis_number'); // RANGKA
            $table->string('engine_number')->nullable(); // NOSIN
            $table->string('color'); // WARNA
            $table->string('sender'); // PENGIRIM
            $table->string('sender_address'); // ALAMAT
            $table->string('recipient'); // PENERIMA
            $table->string('destination'); // TUJUAN
            $table->string('notes')->nullable(); // KETERANGAN
            $table->string('receipt')->nullable(); // KWITANSI
            $table->string('document_notes')->nullable(); // KET. SURAT
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_movements');
    }
};
