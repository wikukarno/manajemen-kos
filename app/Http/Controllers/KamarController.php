<?php

namespace App\Http\Controllers;

use App\Models\DataPenyewa;
use App\Models\Kamar;
use App\Models\TipeKamar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $type = Kamar::with('type')->get();
        $type = TipeKamar::all()->take(3);
        return view('kamar', [
                'types' => $type
                // 'deskripsi' => $deskripsi
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
    public function show(Kamar $kamar)
    {
     return view('kamar', [
            "kamars" => Kamar::all()
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kamar $kamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kamar $kamar)
    {

        $kamar = Kamar::find($kamar->id_penyewa);
        // if ($kamar->id_penyewa !== null) {
        //    $kamar->update(['status' => 'tidak tersedia']); 
        // }

        // if ($kamar->has('id_penyewa')) {
        //     $kamar->update(['status' => 'Tidak tersedia']);
        // } else {
        //     $kamar->update(['status' => 'Tersedia']);
        // }

        if ($request->has('id_penyewa')) {
            if($kamar->id_penyewa != null);
            $kamar->update(['status' => 'Tidak tersedia']);
        } else {
            $kamar->update(['status' => 'Tersedia']);   
        }
    }
            
        
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kamar $kamar)
    {
        //
    }
}