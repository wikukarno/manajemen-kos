<?php

namespace App\Http\Controllers;

use App\Models\Kamar;


use Illuminate\Http\Request;

class detailKamar extends Controller
{
    
    
    
    public function index()
    {
        return view('detailKamar', [
           
        ]);
    }
    
    public function show(detailKamar $detailKamar)
    {
        return view('detailKamar', [
            'availability'=>Kamar::all()
        ]);
    }
}