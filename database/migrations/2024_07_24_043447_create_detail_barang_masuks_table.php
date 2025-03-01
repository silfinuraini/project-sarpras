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
        Schema::create('detail_barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang_masuk', 20);
            $table->string('kode_item', 20);
            $table->integer('kuantiti')->default(0);
            $table->timestamps();

            $table->foreign('kode_barang_masuk')->references('kode')->on('barang_masuk')->cascadeOnDelete();
            $table->foreign('kode_item')->references('kode')->on('item')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_barang_masuks');
    }
};
