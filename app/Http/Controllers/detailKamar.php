<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Kamar;


use Illuminate\Http\Request;

class detailKamar extends Controller
{    
    public function index( Request $request, $id)
    {
        $kamar = Kamar::where('slug', $id)->firstOrFail();
       
        return view('detailKamar', [
            'kamar' => $kamar,
        ]);
    }
    
    public function show(detailKamar $detailKamar)
    {
        return view('detailKamar', [
            "kamar"=> Kamar::all()

        ]);
    }
}