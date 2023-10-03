<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function type()
    {
        return $this->belongsTo(TipeKamar::class, 'id_tipe', 'id');

        // note: scribe di atas digunakan untuk relasi dari tabel kamar ke tabel tipe kamar dimana relasi ini one to one 
    }

}