<?php

namespace Database\Seeders;

use App\Models\TipeKamar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipeKamarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'id'=>1,
                'name'=>"Tipe 2",
                'slug'=>"tipe-2",
                'detail'=>'Ukuran kamar: 3x4 m2,Tempat tidur 1, Meja Belajar 1, lemari 1, Kamar mandi di dalam kamar (kloset duduk)',
                'harga'=>500000
            ],
            [
                'id'=>2,
                'name'=>"Tipe 3",
                'slug'=>"tipe-3",
                'detail'=>'Ukuran kamar: 4x6 m2,Tempat tidur 2, Meja Belajar 2, lemari 2, Kamar mandi di dalam kamar (kloset 2), bisa ditempati berdua',
                'harga'=>700000
            ],
            [
                'id'=>3,
                'name'=>"Tipe 4",
                'slug'=>"tipe-4",
                'detail'=>'Ukuran kamar: 5x6, Tempat tidur 2, Meja Belajar 2, Kamar mandi di dalam kamar (kloset duduk), bisa ditempati berdua',
                'harga'=>1000000
            ]
        ];
        TipeKamar::insert($types);
    }
}