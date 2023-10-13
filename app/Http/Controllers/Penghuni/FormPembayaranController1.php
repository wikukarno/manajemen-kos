<?php

namespace App\Http\Controllers\Penghuni;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FormPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Payment::query();
            $query = Payment::where('id_user', auth()->user()->id)->orderBy('created_at', 'desc')->get();

            return datatables()->of($query)
                ->addIndexColumn()
                
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
                ->editColumn('sisa', function ($item) {
                    return $item->sisa ?? '-';
                })
                ->editColumn('keterangan', function ($item) {
                    return $item->keterangan ?? '-';

                })
                // memenghilangkan tag html
                // ->rawColumns(['action'])
                ->make(true);
        }
        $item=User::find(auth()->user()->id);
        $payments = Payment::all();

        return view('pages.penghuni.payment.index', compact('item'), 
            [
                'payments' => Payment::where('id_user', auth()->user()->id)->get()
            ]
        );
        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item=User::find(auth()->user()->id);
        return view('pages.penghuni.payment.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item=Payment::all();
        $data = $request->all();

        $data['id_user'] = Auth::user()->id;
        $data['harga_bayar'] = Auth::kamar()->harga;
        $data['bukti_bayar'] = $request->file('bukti_bayar')->store('assets/buktiBayar', 'public');
        $data['tanggal_bayar'] = now();
        $data['bulan'] = now()->locale('id_ID')->monthName;
        $data['tahun'] = now()->format('Y');
        // $data['sisa'] = 2000000 - $data['jumlah']

        // if ($data['sisa'] == 0) {
        //     $data['keterangan'] = 'Menunggu Validasi';
        // } elseif ($data['sisa'] > 0) {
        //     $data['keterangan'] = 'Sisa Pembayaran';
        // } elseif ($data['sisa'] == 0 && $data['tanggal_validasi'] !== null) {
        //     $data['keterangan'] = 'Lunas';
        // } else {
        //     $data['keterangan'] = 'Belum Lunas';
        // }


        Payment::create($data);
        
        // Jika pembayaran sisa, lakukan pemrosesan sisa di sini

        return view('pages.penghuni.payment.index')->with('success', 'Kategori Berhasil Ditambahkan!');
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
