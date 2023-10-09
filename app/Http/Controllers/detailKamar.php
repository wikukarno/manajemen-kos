<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Kamar;
use App\Models\User;


use Illuminate\Http\Request;

class detailKamar extends Controller
{    
    public function index( Request $request, $id)
    {
        $kamar = Kamar::where('slug', $id)->firstOrFail();
        $user = User::all();
       
        return view('detailKamar', [
            'kamar' => $kamar,
            'user' => $user,
        ]);
    }

}