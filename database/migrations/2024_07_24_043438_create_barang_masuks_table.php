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
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->string('kode', 20)->primary();
            $table->string('nip', 20);
            $table->string('kode_supplier', 20);
            $table->integer('jumlah_item')->default(0);
            $table->timestamps();

            $table->foreign('nip')->references('nip')->on('pegawai')->cascadeOnDelete();
            $table->foreign('kode_supplier')->references('kode')->on('supplier')->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuks');
    }
};
