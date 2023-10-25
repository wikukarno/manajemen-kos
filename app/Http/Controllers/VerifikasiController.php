<?php

namespace App\Http\Controllers;


use App\Models\DataPenyewa;
use App\Models\Kamar;
use App\Models\TipeKamar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('verifikasi', [
            "kamar" => Kamar::all(),
            "tipekamar" => TipeKamar::all(),
    ]);
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
    public function show(string $id)
    {
             return view('verifikasi', [
            "kamars" => Kamar::all()
        ]);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}