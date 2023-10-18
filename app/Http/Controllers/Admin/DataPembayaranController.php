<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class DataPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            // $query = Payment::query();
            $query = Payment::with('users');
            $query = Payment::with('kamars');

            return datatables()->of($query)
                ->addIndexColumn()

                ->editColumn('id_user', function ($item) {
                    return $item->users ? $item->users->name : '-';
                })
                ->editColumn('id_kamar', function ($item) {
                    return $item->kamars ? $item->kamars->id_tipe : '-';
                })
                ->editColumn('harga_bayar', function ($item) {
                    return $item->harga_bayar ?? '-';
                })
                ->editColumn('bulan', function ($item) {
                    return $item->bulan ?? '-';
                })
                ->editColumn('tahun', function ($item) {
                    return $item->tahun ?? '-';
                })
                ->editColumn('bukti_bayar', function ($item) {
                    return $item->bukti_bayar ?? '-';
                })
                ->editColumn('tanggal_bayar', function ($item) {
                    return $item->tanggal_bayar ?? '-';
                })
                ->editColumn('tanggal_validasi', function ($item) {
                    return $item->tanggal_validasi ?? '-';
                })
                ->editColumn('status', function ($item) {
                    return $item->status ?? '-';
                })
                ->editColumn('keterangan', function ($item) {
                    return $item->keterangan ?? '-';
                })
                ->editColumn('action', function ($item) {
                    return '
                                <div class="d-flex">
                                    <a href="' . route('data-pembayaran.show', $item->id) . '" title="Tampil Detail" class="btn btn-outline-primary btn-sm mb-0 mx-1 ">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="' . route('data-pembayaran.edit', $item->id) . '" title="Edit Data" class="btn btn-outline-warning btn-sm mb-0 mx-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger btn-sm mb-0 mx-1" title="Delete" onClick="btnDeleteDataPembayaran(' . $item->id . ')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div> 
                            ';

                })
                // memenghilangkan tag html
                ->rawColumns(['action'])
                ->make(true);
        }

        $item=Payment::find(auth()->user()->id);
        return view('pages.admin.datapembayaran.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item=Payment::all();
        // untuk mengubah bagian create nya
        return view('pages.admin.datapembayaran.create', compact('item'));
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
    public function destroy(Request $request)
    {
        $item = Payment::findOrFail($request->id);
        $item->delete();

        if ($item) {
            return Response()->json(['status' => true, 'message' => 'Data berhasil dihapus!']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Data gagal dihapus!']);
        }
    }
}
