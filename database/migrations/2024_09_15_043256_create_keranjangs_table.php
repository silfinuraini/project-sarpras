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
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 20); // Match the type and length of 'nip' in 'pegawai' table
            $table->string('kode_item');
            $table->integer('kuantiti');
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
        Schema::dropIfExists('keranjangs');
    }
};
