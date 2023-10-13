<?php

namespace App\Models;

use App\Models\Kamar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipeKamar extends Model
{
    use HasFactory, SoftDeletes;
        public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_tipe', 'id');
    }
}