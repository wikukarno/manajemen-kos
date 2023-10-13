<?php

namespace App\Models;

use App\Models\TipeKamar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kamar extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];
    
    public function type()
    {
        return $this->belongsTo(TipeKamar::class, 'id_tipe', 'id');

        // note: scribe di atas digunakan untuk relasi dari tabel kamar ke tabel tipe kamar dimana relasi ini one to one 
    }

}