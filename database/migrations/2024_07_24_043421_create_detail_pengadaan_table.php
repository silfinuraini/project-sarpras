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
        Schema::create('detail_pengadaan', function (Blueprint $table) {
            $table->string('kode_pengadaan', 20)->primary();
            $table->string('kode_item', 20)->unique();
            $table->integer('kuantiti');
            $table->integer('kuantiti_disetujui');
            $table->timestamps();

            $table->foreign('kode_pengadaan')->references('kode')->on('pengadaan')->onDelete('cascade');
            $table->foreign('kode_item')->references('kode')->on('item')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pengajuans');
    }
};
