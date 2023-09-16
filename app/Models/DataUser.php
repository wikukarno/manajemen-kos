<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataUser extends Model
{
    // use HasFactory;

    // untuk menggabungkan 2 tabel dengan foreign key
    function User() {
        return $this->belongsTo(User::class, 'id');
    }

    // public function allData()
    // {
    //     return DB::table('users')->get();
    // }
    
    // public function allData()
    // {
    //     return DB::table('data_users')->get();
    // }
}
