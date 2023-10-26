<?php

namespace App\Models;

use App\Models\Kamar;
use App\Models\TipeKamar;
use App\Models\DataPenyewa;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

}
