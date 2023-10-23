<?php

namespace App\Http\Controllers;

use App\Models\Galleries;
use App\Models\TipeKamar;
use Illuminate\Http\Request;
use App\Models\Kamar;

class TipeKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
         $kamar = Kamar::all();
         $tipeKamar = TipeKamar::all();
         $galleries = Galleries::all();
       
        return view('kamar', [
            'kamar' => $kamar,
            'type' => $tipeKamar,
            'galleries' => $galleries
        ]);
    }
    public function detailTipe(Request $request, $slug)
    {   
       $types = TipeKamar::all();
       $tipeKamar = TipeKamar::where('slug', $slug)->firstOrFail();
       $kamar = Kamar::where('id_tipe', $tipeKamar->id)->paginate(2);

       return view('detail-tipe', [
        'types' => $types,
        'kamar' => $kamar,
        'tipeKamar' => $tipeKamar
       ]);

       
        //code jika ingin manampilkan macam2 kamar dari tipe kamarnya jika dalam 1 tabel database
        // $detailTipe = Kamar::where('tipe', $tipe)->get();
        // return view('detail-tipe', compact('detailTipe', 'tipe'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TipeKamar $tipeKamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipeKamar $tipeKamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipeKamar $tipeKamar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipeKamar $tipeKamar)
    {
        //
    }
}