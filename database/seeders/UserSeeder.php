<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'id'=>1,
                'email'=>"siti@gmail.com",
                'name'=>"siti",
                'password'=>bcrypt('123'),
                'role'=>"Pemilik",
                'status_akun'=>"Terverifikasi",
            ],
            [
                'id'=>2,
                'email'=>"alya@gmail.com",
                'name'=>"alya",
                'password'=>bcrypt('123'),
                'role'=>"Pendaftar",
                'status_akun'=>"Terverifikasi",
            ],
            [
                'id'=>3,
                'email'=>"agata@gmail.com",
                'name'=>"agata",
                'password'=>bcrypt('123'),
                'role'=>"Penghuni",
                'status_akun'=>"Terverifikasi",
            ]
        ];
        User::insert($user);
    }
}
