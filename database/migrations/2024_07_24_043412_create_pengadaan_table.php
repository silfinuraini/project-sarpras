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
        
        Schema::create('pengadaan', function (Blueprint $table) {
            $table->string('kode', 20)->primary();
            $table->string('nip', 20)->unique();
            $table->integer('jumlah_barang')->default(0);
            $table->timestamps();
            
            $table->foreign('nip')->references('nip')->on('pegawai')->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengadaan');
    }
};
