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
    public function index( Request $request, $id)
    {
        $kamar = Kamar::where('slug', $id)->firstOrFail();
        $user = User::all();
       
        return view('detailKamar', [
            'kamar' => $kamar,
            'user' => $user,
        ]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required',
        'hp2' => 'required|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/',
        'wali' => 'required',
        'id_telegram' => 'required',
        'dokumen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

        $user= new User();
        $user->tempat_lahir=$request->tempat_lahir;
        $user->tanggal_lahir=$request->tanggal_lahir;
        $user->alamat=$request->alamat;
        $user->hp2=$request->hp2;
        $user->wali=$request->wali;
        $user->id_telegram=$request->id_telegram;
        $user->dokumen=$request->dokumen;
        $user->save();
        
        return redirect()->route('availability.detail-kamar.pemesanan')->with('success', 'Data Hass Been Added');
        

    }
}