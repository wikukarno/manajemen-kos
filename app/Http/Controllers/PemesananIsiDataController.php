<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PemesananIsiDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $kamars = Kamar::all();
       
        return view('IsiData', compact('kamars', 'user'));
        
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
        // $data = $request->only(['tempat_lahir', 'tanggal_lahir', 'alamat', 'hp2', 'wali', 'id_telegram', 'dokumen']);
        // $data = $request->all();
        $user = User::findOrFail($id);
        
        if ($request->hasFile('dokumen')) {
            $dokumen = $request->file('dokumen')->store('assets/penghuni/ktp', 'public');
            }
        else {
            $dokumen = null;
        }   
        
        // $user->update($data);
        $user->update([
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'alamat'=>$request->alamat,
            'hp2'=>$request->hp2,
            'wali'=>$request->wali,
            'id_telegram'=>$request->id_telegram,
            'dokumen'=>$dokumen
        ]);
        return redirect()->route('availabality');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}