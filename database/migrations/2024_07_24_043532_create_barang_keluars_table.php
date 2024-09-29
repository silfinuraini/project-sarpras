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
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->string('kode', 20)->primary();
            $table->string('nip', 20);
            $table->string('kode_item', 20);
            $table->integer('kuantiti')->default(0);
            $table->timestamps();

            $table->foreign('nip')->references('nip')->on('pegawai')->cascadeOnDelete();
            $table->foreign('kode_item')->references('kode')->on('item')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluar');
    }
};
