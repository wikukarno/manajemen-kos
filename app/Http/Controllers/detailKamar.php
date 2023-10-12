<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Kamar;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class detailKamar extends Controller
{    
    public function index( Request $request, $id)
    {
        $kamar = Kamar::where('slug', $id)->firstOrFail();
        $user = Auth::user();
       
        return view('detailKamar', [
            'kamar' => $kamar,
            'user' => $user,
        ]);
    }
    public function create(Request $request)
    {
        $validateData = $request->validate([
            'wali' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamt' => 'required',
            'hp2' => 'required',
            'id_telegram' => 'required',
            'fasilitas' => 'required',
            'document' => 'required'
            
        ]);

        User::created($validateData);

        return redirect()->back()->with('success', 'data berhasil di simpan');
        

    }
}