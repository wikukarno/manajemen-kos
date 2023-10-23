<?php

namespace Database\Seeders;

use App\Models\Kamar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KamarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kamar = [
            [
                'id'=>1,
                'nomor_kamar'=>"1",
                'id_tipe'=>"1",
                'deskripsi'=>"Ukuran kamar: 3x4 m2,Tempat tidur 1, Meja Belajar 1, lemari 1, Kamar mandi di dalam kamar (kloset duduk)",
                'status'=>"Tersedia",
                'slug'=>"no-1",
                'harga'=>"500000",
            ],
            [
                'id'=>2,
                'nomor_kamar'=>"2",
                'id_tipe'=>"1",
                'deskripsi'=>"Ukuran kamar: 3x4 m2,Tempat tidur 1, Meja Belajar 1, lemari 1, Kamar mandi di dalam kamar (kloset duduk)",
                'status'=>"Tersedia",
                'slug'=>"no-2",
                'harga'=>"500000",
            ],
            [
                'id'=>3,
                'nomor_kamar'=>"3",
                'id_tipe'=>"1",
                'deskripsi'=>"Ukuran kamar: 3x4 m2,Tempat tidur 1, Meja Belajar 1, lemari 1, Kamar mandi di dalam kamar (kloset duduk)",
                'status'=>"Tersedia",
                'slug'=>"no-1",
                'harga'=>"500000",
            ],
            [
                'id'=>4,
                'nomor_kamar'=>"4",
                'id_tipe'=>"2",
                'deskripsi'=>"Ukuran kamar: 4x6 m2,Tempat tidur 2, Meja Belajar 2, lemari 2, Kamar mandi di dalam kamar (kloset 2), bisa ditempati berdua",
                'status'=>"Tersedia",
                'slug'=>"no-4",
                'harga'=>"700000",
            ],
            [
                'id'=>5,
                'nomor_kamar'=>"5",
                'id_tipe'=>"2",
                'deskripsi'=>"Ukuran kamar: 4x6 m2,Tempat tidur 2, Meja Belajar 2, lemari 2, Kamar mandi di dalam kamar (kloset 2), bisa ditempati berdua",
                'status'=>"Tersedia",
                'slug'=>"no-5",
                'harga'=>"700000",
            ],
            [
                'id'=>6,
                'nomor_kamar'=>"6",
                'id_tipe'=>"2",
                'deskripsi'=>"Ukuran kamar: 4x6 m2,Tempat tidur 2, Meja Belajar 2, lemari 2, Kamar mandi di dalam kamar (kloset 2), bisa ditempati berdua",
                'status'=>"Tersedia",
                'slug'=>"no-6",
                'harga'=>"700000",
            ],
            [
                'id'=>7,
                'nomor_kamar'=>"7",
                'id_tipe'=>"3",
                'deskripsi'=>"Ukuran kamar: 5x6, Tempat tidur 2, Meja Belajar 2, Kamar mandi di dalam kamar (kloset duduk), bisa ditempati berdua",
                'status'=>"Tersedia",
                'slug'=>"no-7",
                'harga'=>"1000000",
            ]
        ];
        Kamar::insert($kamar);
    }
}