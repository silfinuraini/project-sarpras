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
        Schema::create('item', function (Blueprint $table) {
            $table->string('kode', 10)->primary();
            $table->string('nama', 100);
            $table->string('jenis', 20)->nullable();
            $table->string('warna', 20)->nullable();
            $table->string('ukuran', 20)->nullable();
            $table->string('merk', 20);
            $table->string('satuan', 10);
            $table->string('gambar')->nullable();
            $table->integer('harga');
            $table->integer('stok')->default(0);
            $table->integer('stok_minimum')->default(0);
            $table->unsignedBigInteger('kategori_id');
            $table->text('deskripsi');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategori')->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
