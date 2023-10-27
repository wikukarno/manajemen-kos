<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galleries extends Model
{
    use HasFactory;
    protected $fillable = [
        'galleries', 'id_kamar'
    ];
    
    public function kamar()
    {
        return $this->belongsTo(Galleries::class, 'id_kamar', 'id');
    }
}