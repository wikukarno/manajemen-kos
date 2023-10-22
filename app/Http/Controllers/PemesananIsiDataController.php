<?php

namespace App\Http\Controllers;

use App\Models\DataPenghuni;
use App\Models\DataPenyewa;
use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\TipeKamar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PemesananIsiDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $id)
    {
        $user = User::find(auth()->user()->id);
        
        //$kamar = Kamar::findOrFail($id);
        // $item = TipeKamar::findOrFail($id);
        
        // $kamar = Kamar::find($id);
        // $tipe = TipeKamar::find($id);

        
        // $kamar = Kamar::all();
        // $item = TipeKamar::all();

        $kamar = Kamar::where('id')->get();
        // $types = TipeKamar::all();
        
        
        // $item = DataPenghuni::all()->take(2);
        $items = DataPenghuni::with('kamar')
            ->where('id_penghuni', Auth::user()->id)
            ->get();
            
       
         return view('IsiData', [
            'items' => $items,
         
         ] ,compact('user', 'items'));
        
        // return view('IsiData',
        //  compact('user', 'kamar', 'item'));
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
        $data = $request->all();
        // $kamar = Kamar::all();
        // $tipe = TipeKamar::all();
        
        // return view('IsiData', [
        //    'item' => $kamar,
        //    'user'=> $tipe,
        // ]);

        $data["id_penghuni"] = auth()->user()->id;
        DataPenghuni::create($data);
        
        return redirect()->route('isi-data.index');
    
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
        $penghuni = DataPenghuni::find($id);
        return view('IsiData', compact('penghuni'));
        
        DataPenghuni::where('id_penghuni', auth()->user()->id)->delete();
        return back();

        
    }
}