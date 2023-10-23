<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function kamars()
    {
        return $this->belongsTo(Kamar::class, 'id_tipe', 'id');
    }

    function payment() {
        return $this->belongsTo(Payment::class, 'nama_user','nomor_kamar');
    }
}
