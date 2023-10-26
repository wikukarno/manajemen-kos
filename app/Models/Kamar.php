<?php

namespace App\Models;

use App\Models\TipeKamar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kamar extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];
    
    public function type()
    {
        return $this->belongsTo(TipeKamar::class, 'id_tipe', 'id');
        // id_tipe => dari model kamar
        // id => dari model tipe kamar
        

        // note: scribe di atas digunakan untuk relasi dari tabel kamar ke tabel tipe kamar dimana relasi ini one to one 
    }
    public function galleries()
    {
        return $this->belongsTo(Galleries::class, 'id_kamar', 'id');

        // note: scribe di atas digunakan untuk relasi dari tabel kamar ke tabel tipe kamar dimana relasi ini one to one 
    }
    public function penyewa()
    {
        return $this->belongsTo(DataPenyewa::class, 'id_penyewa', 'id');

        // note: scribe di atas digunakan untuk relasi dari tabel kamar ke tabel tipe kamar dimana relasi ini one to one 
    }

}