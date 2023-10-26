<?php

namespace App\Models;
use App\Models\Kamar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenghuni extends Model
{
    use HasFactory;
    // protected $table="data_penghunis";
    // protected $primaryKey="id";
    protected $guarded = ['id'];
    
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_penghuni', 'id');
    }
}