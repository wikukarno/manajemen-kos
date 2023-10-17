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
        Schema::create('data_penghunis', function (Blueprint $table) {
            $table->id();
            $table->string('id_penghuni');
            $table->integer('nomor_kamar_penghuni')->nullable();
            $table->string('tipe_kamar_penghuni')->nullable();
            $table->bigInteger('harga_kamar_penghuni')->nullable();
            $table->string('fasilitas')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penghunis');
    }
};
