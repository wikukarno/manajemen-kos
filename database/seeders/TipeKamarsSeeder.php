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
                'name'=>"Tipe 1",
                'slug'=>"tipe-1",
            ],
            [
                'id'=>2,
                'name'=>"Tipe 2",
                'slug'=>"tipe-2",
            ]
        ];
        TipeKamar::insert($types);
    }
}