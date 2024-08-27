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
        Schema::create('detail_permintaan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_permintaan', 20);
            $table->string('kode_item', 20);
            $table->integer('kuantiti');
            $table->integer('kuantiti_disetujui');
            $table->timestamps();

            $table->foreign('kode_permintaan')->references('kode')->on('permintaan')->onDelete('cascade');
            $table->foreign('kode_item')->references('kode')->on('item')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_permintaans');
    }
};
