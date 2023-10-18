<?php

namespace App\Http\Controllers\Penghuni;

use App\Models\User;
use App\Models\Kamar;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Payment::query()->orderBy('created_at', 'desc')->get();
            // mengambil id yang sedang login dari tabel user
            $query = Payment::where('id_user', auth()->user()->id)->orderBy('created_at', 'desc')->get();

            return datatables()->of($query)
                ->addIndexColumn()
                
                ->editColumn('tipe_kamar_penghuni', function ($item) {
                    return $item->tipe_kamar_penghuni ?? '-';
                })
                ->editColumn('nomor_kamar_penghuni', function ($item) {
                    return $item->nomor_kamar_penghuni ?? '-';
                })
                ->editColumn('bulan', function ($item) {
                    return $item->bulan ?? '-';
                })
                ->editColumn('tahun', function ($item) {
                    return $item->tahun ?? '-';
                })
                ->editColumn('tanggal_bayar', function ($item) {
                    return $item->tanggal_bayar ?? '-';
                })
                ->editColumn('tanggal_validasi', function ($item) {
                    return $item->tanggal_validasi ?? '-';
                })
                ->editColumn('jumlah', function ($item) {
                    return $item->jumlah ?? '-';
                })
                ->editColumn('status', function ($item) {
                    return $item->status ?? '-';
                })
                ->editColumn('keterangan', function ($item) {
                    return $item->keterangan ?? '-';

                })
                // memenghilangkan tag html
                // ->rawColumns(['action'])
                ->make(true);
        }

        // untuk mengambil riwayat pembayaran   
        $riwayatPembayaranTerakhir = Payment::latest()->first();

        //jika ada pembayaran terakhir maka lakukan hal berikut
        if ($riwayatPembayaranTerakhir) {
            $statusPembayaranBulanIni = $riwayatPembayaranTerakhir->status;
        }else {
            $statusPembayaranBulanIni = null;
        }

        // jika status pembayaran 'Menunggu Validasi' maka tombol validasi di disabled
        if ($statusPembayaranBulanIni === 'Menunggu Validasi') {
            $tambahPembayaranDisabled = true; 
        } else {
            $tambahPembayaranDisabled = false;
        }

        return view('pages.penghuni.payment.index', compact('tambahPembayaranDisabled'),
            [
                // ini untuk menampilkan data pembayaran hanya untuk id yg login saat itu
                'payments' => Payment::where('id_user', auth()->user()->id)->orderBy('created_at', 'desc')->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Untuk mengambil nama dari ke 12 bulan
        $bulanNames = [];
        for ($i = 1; $i <= 12; $i++) {
            $bulan = Carbon::create()->month($i)->locale('en')->monthName;
            array_push($bulanNames, $bulan);
        }

        // Dapatkan tahun saat ini
        $tahun = Carbon::now()->isoFormat('Y');

        // Membuat array untuk status pembayaran setiap bulan
        $statusPembayaran = [];
        $tanggalSekarang = Carbon::now()->isoFormat('D-MMMM-Y');

        // untuk mendeteksi bulan yang status pembayarannya Lunas
        foreach ($bulanNames as $bulan) {
            $status = Payment::where('bulan', $bulan)->where('tahun', $tahun)->where('status', 'Lunas')->exists();
            $statusPembayaran[$bulan] = $status;
        }

        return view('pages.penghuni.payment.create', compact('bulanNames', 'statusPembayaran', 'tahun', 'tanggalSekarang'));
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
    
        $extension = $request->file('bukti_bayar')->getClientOriginalExtension();
        $timestamp = now()->timestamp;
        $nama_file = $bulanBayar . '_' . $tahun . '_' . $idUser . '.' . $timestamp . '.' . $extension;

        $buktiBayar = $request->file('bukti_bayar')->storeAs('assets/buktiBayar', $nama_file, 'public');

        Payment::create([   
            'id_user' => $idUser,
            'bulan'=> $bulan,
            'tahun' => $tahun,
            'tanggal_bayar' => $tanggalBayar, 
            'bukti_bayar' => $buktiBayar,
        ]);

        // perbedaan return view sama return redirect route 
        // return view untuk melihat ke halaman tersebut dengan isi dari form yang masih ada
        // sedangkan return redirect itu untuk melempar kita ke halaman yg dituju dengan data yang sudah di kirimkan
        return redirect()->route('pembayaran-penghuni.index')->with('success', 'New payment has been added!');
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
