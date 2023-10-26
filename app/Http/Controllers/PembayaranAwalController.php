<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kamar;
use App\Models\TipeKamar;
use App\Models\DataPenyewa;
use App\Models\DataPenghuni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PembayaranAwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $kamar = Kamar::where('id')->get();
            
       
         return view('PembayaranAwal', compact('user', 'tipe', 'kamar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipe = DataPenghuni::with('kamar.type')->where('id_penghuni', Auth::user()->id)->first();
       
         return view('PembayaranAwal', compact('tipe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         return view('PembayaranAwal', compact('tipe'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}