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
                'deskripsi'=>"Tempat tidur 1, Meja Belajar 1, Kamar mandi di dalam kamar",
                'status'=>"Tersedia",
                'slug'=>"no-1",
                'harga'=>"2000",
            ],
            [
                'id'=>2,
                'nomor_kamar'=>"2",
                'id_tipe'=>"1",
                'deskripsi'=>"Tempat tidur 1, Meja Belajar 1, Kamar mandi di dalam kamar",
                'status'=>"Tersedia",
                'slug'=>"no-2",
                'harga'=>"2000",
            ],
            [
                'id'=>3,
                'nomor_kamar'=>"3",
                'id_tipe'=>"1",
                'deskripsi'=>"Tempat tidur 1, Meja Belajar 1, Kamar mandi di dalam kamar",
                'status'=>"Tersedia",
                'slug'=>"no-1",
                'harga'=>"2000",
            ],
            [
                'id'=>4,
                'nomor_kamar'=>"4",
                'id_tipe'=>"2",
                'deskripsi'=>"Tempat tidur 2, Meja Belajar 2, Kamar mandi di dalam kamar",
                'status'=>"Tersedia",
                'slug'=>"no-4",
                'harga'=>"3000",
            ],
            [
                'id'=>5,
                'nomor_kamar'=>"5",
                'id_tipe'=>"2",
                'deskripsi'=>"Tempat tidur 2, Meja Belajar 2, Kamar mandi di dalam kamar",
                'status'=>"Tersedia",
                'slug'=>"no-5",
                'harga'=>"3000",
            ],
            [
                'id'=>6,
                'nomor_kamar'=>"6",
                'id_tipe'=>"2",
                'deskripsi'=>"Tempat tidur 2, Meja Belajar 2, Kamar mandi di dalam kamar",
                'status'=>"Tersedia",
                'slug'=>"no-6",
                'harga'=>"3000",
            ]
        ];
        Kamar::insert($kamar);
    }
}