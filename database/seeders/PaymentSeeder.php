<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payment = [
            [
                'id_user'=>1,
                'id_tipe'=>1,
                'bulan'=>"October",
                'tahun'=>"2023",
                'status'=>'Lunas'
            ],
            [
                'id_user'=>2,
                'id_tipe'=>2,
                'bulan'=>"August",
                'tahun'=>"2023",
                'status'=>'Lunas'
            ]
        ];
        Payment::insert($payment);
    }
}
