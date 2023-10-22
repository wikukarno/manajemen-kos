<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Kamar;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Whoops\Run;

class detailKamar extends Controller
{    

    // contoh relasi
    // $item = Kamara::with('type')->get();
    // cara mab=nggil nya
    // $item->type->name;
    
    public function index( Request $request, $id)
    {
        $type = Kamar::with('type')->get();
        $kamar = Kamar::where('slug', $id)->firstOrFail();
        $user = User::all();
       
        return view('detailKamar', compact('kamar', 'user', 'type'));

    }

    
}