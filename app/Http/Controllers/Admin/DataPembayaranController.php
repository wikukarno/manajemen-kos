<?php

namespace App\Http\Controllers\Admin;

// use Carbon\Carbon;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Payment;
use App\Models\TipeKamar;
use App\Models\DataPenghuni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class DataPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            // $query = Payment::query();
            $query = Payment::with('users','kamars.type')->get();
            

            return datatables()->of($query)
                ->addIndexColumn()

                ->editColumn('nama_penghuni', function ($item) {
                    return $item->users ? $item->users->name : '-';
                })
                ->editColumn('tipe_kamar', function ($item) {
                    return $item->kamars->type->name;
                })
                ->editColumn('nomor_kamar', function ($item) {
                    return $item->kamars->nomor_kamar ?? '-';
                })
                ->editColumn('harga_kamar', function ($item) {
                    return $item->kamars->harga ?? '-';
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
                ->editColumn('bukti_bayar', function ($item) {
                    return $item->bukti_bayar ?? '-';
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
        // Untuk mengambil nama dari ke 12 bulan
        $bulanNames = [];
        for ($i = 1; $i <= 12; $i++) {
            $bulan = Carbon::create()
                ->month($i)
                ->locale('en')->monthName;
            array_push($bulanNames, $bulan);
        }

        // Dapatkan tahun saat ini
        $tahun = Carbon::now()->isoFormat('Y');

        $tipekamar=TipeKamar::all();
        $payment=Payment::all();
        $user=User::where('role', 'penghuni')->get();
        $kamar=Kamar::all();

        $tipe = DataPenghuni::where('id_penghuni', auth()->user()->id)->first();

        // untuk mengubah bagian create nya
        return view('pages.admin.datapembayaran.create', compact('payment','user','kamar','tipekamar','bulanNames','tahun','tipe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item=Payment::find($id);
        $tipe=TipeKamar::all();
        return view('pages.admin.datapembayaran.show', compact('item', 'tipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Payment::findOrFail($id);
        // untuk menampilkan ke halaman edit nya
        return view('pages.admin.datapembayaran.edit', [
            'item' => $item
        ]);
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
