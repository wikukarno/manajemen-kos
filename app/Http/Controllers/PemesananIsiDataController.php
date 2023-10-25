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

class PemesananIsiDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $id)
    {
        $user = User::find(auth()->user()->id);
        
   

        $kamar = Kamar::where('id')->get();
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
        $data=$request->all();
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

        return redirect()->route('home')->with('message', 'verifikasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $penghuni = DataPenghuni::findOrFail($id);
        // return view('IsiData', compact('penghuni'));
        
        // DataPenghuni::where('id_penghuni', auth()->user()->id)->delete();
        // return back();

        $user = User::findOrFail($id); 
        DataPenghuni::where('id_penghuni', $id)->delete();
        return redirect()->route('availabality')->with('message', 'Data berhasil dihapus');
        
    }
    public function hapus()
    {
        DataPenghuni::truncate();
        return response()->json(['message' => 'Batal Pemesanan']);
    }
}