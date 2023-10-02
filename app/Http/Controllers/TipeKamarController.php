<?php

namespace App\Http\Controllers;

use App\Models\TipeKamar;
use Illuminate\Http\Request;
use App\Models\Kamar;

class TipeKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('detail-tipe');
    }
    public function detailTipe($tipe)
    {   
        // $tipes = Kamar::all();
        // $tipe = Kamar::where('tipe', $tipe)->firstOrFail();
        // $kamar = Kamar::where('tipe', $tipe->tipe);
        // return view('detail-tipe', [
        //     'tipe' => $tipe,
        //     'tipes' => $tipes,
        //     'kamar' => $kamar
        // ]);

        $detailTipe = Kamar::where('tipe', $tipe)->get();
        return view('detail-tipe', compact('detailTipe', 'tipe'));
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