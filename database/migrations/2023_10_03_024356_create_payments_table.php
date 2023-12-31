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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('id_tipe');
            $table->string('bulan');
            $table->integer('tahun');
            $table->bigInteger('harga_bayar')->nullable();
            $table->string('bukti_bayar')->nullable();
            $table->date('tanggal_bayar')->nullable();
            $table->date('tanggal_validasi')->nullable();
            $table->enum('status', ['Menunggu Validasi', 'Lunas', 'Belum Lunas', 'Unggah Bukti Bayar'])->default('Menunggu Validasi');
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
