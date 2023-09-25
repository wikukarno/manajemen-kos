<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataPenghuni extends Model
{
    use HasFactory;

    // untuk menggabungkan 2 tabel dengan foreign key
    function User() {
        return $this->belongsTo(User::class, 'id');
    }
}
