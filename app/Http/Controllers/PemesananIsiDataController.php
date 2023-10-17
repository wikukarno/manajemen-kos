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
        $users = User::find(auth()->user()->id);
        $kamars = Kamar::all();
       
        return view('IsiData', compact('kamars'));
        
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
        $data = $request->only(['tempat_lahir', 'tanggal_lahir', 'alamat', 'hp2', 'wali', 'id_telegram', 'dokumen']);
        $user = User::findOrFail($id);

         if ($request->hasFile('dokumen')) {
            if (Auth::user()->dokumen != null) {
                Storage::disk('public')->delete(Auth::user()->dokumen);
                $data['dokumen'] = $request->file('dokumen')->store('assets/penghuni/ktp', 'public');
            } else {
                $data['dokumen'] = $request->file('dokumen')->store('assets/penghuni/ktp', 'public');
            }
        }
        
        $user->update($data);
        return redirect()->route('availability')->with('success', 'Data anda berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}