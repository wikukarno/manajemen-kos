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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('role', ['Pemilik', 'Penghuni', 'Pendaftar'])->default('Pendaftar');
            $table->enum('status_akun', ['Terverifikasi', 'Belum Verifikasi', 'Diblokir'])->default('Belum Verifikasi');
            $table->string('alamat')->nullable();
            $table->string('hp')->nullable();
            $table->string('hp2')->nullable();
            $table->string('wali')->nullable();
            $table->string('uname')->unique()->nullable();
            $table->string('password');
            $table->string('id_telegram')->nullable();
            $table->string('mac_addr')->nullable();
            $table->string('dokumen')->nullable();
            $table->string('profil')->nullable();
            $table->string('fasilitas')->nullable();
            $table->string('alasan_penolakan')->nullable();
            $table->timestamps();
            $table->softDeletes();
            // $table->id();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
