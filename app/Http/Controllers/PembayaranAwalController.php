<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kamar;
use App\Models\TipeKamar;
use App\Models\DataPenyewa;
use App\Models\Payment;
use App\Models\DataPenghuni;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        // mengambil nama bulan berdasarkan nama bulan yang dipilih melalui select  
        $selectedBulan = $request->input('selectedBulan');
        $bulan = Carbon::create()->month($selectedBulan)->isoFormat('MMMM');

        $idUser= Auth::user()->id;
        $bulanBayar= $bulan;
        $tahun = Carbon::now()->isoFormat('Y');
        $tanggalBayar = Carbon::now();
        $tipe = DataPenghuni::where('id_penghuni', auth()->user()->id)->first();
        if ($tipe) {
            $idKamar = $tipe->id_kamar;
            $hargaBayar = $tipe->kamar->harga;
        }

    
        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
        
            if ($file->isValid()) {
                $extension = $file->getClientOriginalExtension();
                $timestamp = now()->timestamp;
                $nama_file = $bulanBayar . '.' . $tahun . '.' . $idUser . '.' . $timestamp . '.' . $extension;
        
                $buktiBayar = $file->storeAs('assets/buktiBayar', $nama_file, 'public');
            } 
        } else {
            $buktiBayar = null;
        }

        if ($buktiBayar == null){
            $status = 'Unggah Bukti Bayar';
        } else{
            $status = 'Menunggu Validasi';
        }

        Payment::create([   
            'id_user' => $idUser,
            'id_tipe' => $idKamar,
            'bulan'=> $bulan,
            'tahun' => $tahun,
            'harga_bayar' => $hargaBayar,
            'tanggal_bayar' => $tanggalBayar, 
            'bukti_bayar' => $buktiBayar,
            'status' => $status,
        ]);

        // perbedaan return view sama return redirect route 
        // return view untuk melihat ke halaman tersebut dengan isi dari form yang masih ada
        // sedangkan return redirect itu untuk melempar kita ke halaman yg dituju dengan data yang sudah di kirimkan
        // return redirect()->route('pembayaran-penghuni.index')->with('success', 'New payment has been added!');
         return view('verifikasi', compact('tipe'));
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
        DataPenghuni::with('data_penghunis', 'payments')
                        ->where('id_penghuni', Auth::user()->id)
                        ->delete();
    }
}