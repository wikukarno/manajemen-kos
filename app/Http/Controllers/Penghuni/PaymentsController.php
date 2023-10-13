<?php

namespace App\Http\Controllers\Penghuni;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Payment::query();
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
        $item=User::find(auth()->user()->id);

        return view('pages.penghuni.payment.index', compact('item'), 
            [
                // ini untuk menampilkan data pembayaran hanya untuk id yg login saat itu
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
