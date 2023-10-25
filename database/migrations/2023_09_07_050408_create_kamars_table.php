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
        Schema::create('kamars', function (Blueprint $table) {
           $table->id();
            $table->integer('nomor_kamar');
            $table->string('id_tipe');
            $table->string('deskripsi');
            $table->integer('id_penyewa')->nullable();
            $table->string('status');
            $table->string('slug');
            $table->bigInteger('harga');
            $table->string('galleries')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};