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
        $data["id_penghuni"] = auth()->user()->id;

        $id_penghuni["id_penghuni"] = auth()->user()->id;
        $penghuni = DataPenghuni::where('id_penghuni', $id_penghuni)->first();
        

        if ($penghuni) {
            return redirect()->back()->with('error', 'Anda tidak diizinkan untuk memesan kamar lagi');
        };
        
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
            if ($data['dokumen'] != null) {
                Storage::disk('public')->delete($data['dokumen']);
                $data['dokumen'] = $request->file('dokumen')->store('assets/penyewa/dokumen-ktp', 'public');
            }
        }
        
        $user->update($data);
        return redirect()->route('pembayaran-pertama.create');
        // return view('PembayaranAwal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $user = User::findOrFail($id); 
        DataPenghuni::where('id_penghuni', $id)->delete();
        return redirect()->route('availabality')->with('message', 'Data berhasil dihapus');
        
    }
    public function hapus()
    {
        DataPenghuni::truncate();
        return response()->json(['message' => 'Batal Pemesanan']);
    }

        public function verifikasi()
    {
        return view('verifikasi', [
            "kamars" => Kamar::all()
        ]);
    }
}