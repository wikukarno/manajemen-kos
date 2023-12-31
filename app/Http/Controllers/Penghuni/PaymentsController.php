<?php

namespace App\Http\Controllers\Penghuni;

use App\Http\Controllers\Admin\DataKamarController;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Payment;
use App\Models\DataPenghuni;
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
            // $query = Payment::query()->orderBy('created_at', 'desc')->get();
            // mengambil id yang sedang login dari tabel user
            $query = Payment::where('id_user', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->get();

            $tipe = DataPenghuni::where('id_penghuni', auth()->user()->id)->first();

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
                ->editColumn('jumlah', function ($item) use ($tipe) {
                    return $tipe->kamar->harga ?? '-';
                })
                ->editColumn('status', function ($item) {
                    // $status = $item->status ?? '-';
                    // if($status === 'Lunas') {
                    //     return '<div class="badge badge-success text-dark">'.$status.'</div>';
                    // } elseif($status === 'Menunggu Validasi') {
                    //     return '<div class="badge badge-warning text-dark">'.$status.'</div>';
                    // } elseif($status === 'Unggah Bukti Bayar') {
                    //     return '<div class="badge badge-info text-dark">'.$status.'</div>';
                    // } else {
                    //     return '<div class="badge badge-danger text-light">'.$status.'</div>';
                    // }
                    $status = $item->status ?? '-';
                    $statusClass = '';
                    switch ($status) {
                        case 'Lunas':
                            $statusClass = 'badge-success';
                            break;
                        case 'Menunggu Validasi':
                            $statusClass = 'badge-warning';
                            break;
                        case 'Unggah Bukti Bayar':
                            $statusClass = 'badge-danger';
                            break;
                        default:
                            $statusClass = 'badge-info';
                            break;
                    }
                    return '<div class="badge text-dark ' . $statusClass . '">' . $status . '</div>';
                })
                ->editColumn('keterangan', function ($item) {
                    return $item->keterangan ?? '-';
                })
                ->editColumn('aksi', function ($item) {
                    return '
                                <div class="d-flex">
                                    <a href="' . route('pembayaran-penghuni.show', $item->id) . '" title="Tampil Detail" class="btn btn-outline-primary btn-sm mb-0 mx-1 ">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div> 
                            ';
                })
                // memenghilangkan tag html
                ->rawColumns(['status', 'aksi'])
                ->make(true);
        }

        // untuk mengambil riwayat pembayaran hanya berdasarkan id yang sedang login
        $riwayatPembayaranTerakhir = Payment::latest()
            ->where('id_user', auth()->user()->id)
            ->first();

        //jika ada pembayaran terakhir maka lakukan hal berikut
        if ($riwayatPembayaranTerakhir) {
            $statusPembayaranBulanIni = $riwayatPembayaranTerakhir->status;
        }else {
            $statusPembayaranBulanIni = null;
        }

        // jika status pembayaran 'Menunggu Validasi' maka tombol validasi di disabled
        if ($statusPembayaranBulanIni === 'Menunggu Validasi') {
            $tambahPembayaranDisabled = true; 
        } elseif ($statusPembayaranBulanIni === 'Unggah Bukti Bayar') {
            $tambahPembayaranDisabled = true;
        } else {
            $tambahPembayaranDisabled = false;
        }

        $item=User::find(auth()->user()->id);

        return view('pages.penghuni.payment.index', compact('tambahPembayaranDisabled', 'item', 'riwayatPembayaranTerakhir'),
            [
                // ini untuk menampilkan data pembayaran hanya untuk id yg login saat itu
                'payments' => Payment::where('id_user', auth()->user()->id)
                    ->orderBy('created_at', 'desc')
                    ->get()
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
            $bulan = Carbon::create()
                ->month($i)
                ->locale('en')->monthName;
            array_push($bulanNames, $bulan);
        }

        // Dapatkan tahun saat ini
        $tahun = Carbon::now()->isoFormat('Y');

        // Membuat array untuk status pembayaran setiap bulan
        $statusPembayaran = [];
        $tanggalSekarang = Carbon::now()->isoFormat('D-MMMM-Y');

        // untuk mendeteksi bulan yang status pembayarannya Lunas berdasarkan id yang login
        foreach ($bulanNames as $bulan) {
            $status = Payment::where('bulan', $bulan)
                ->where('tahun', $tahun)
                ->where('id_user', auth()->user()->id)
                ->where('status', 'Lunas')
                ->exists();
            $statusPembayaran[$bulan] = $status;
        }

        $tipe = DataPenghuni::where('id_penghuni', auth()->user()->id)->first();
        $namaTipe = $tipe->kamar->type;

        return view('pages.penghuni.payment.create', compact('bulanNames', 'statusPembayaran', 'tahun', 'tanggalSekarang', 'tipe', 'namaTipe'));
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
        return redirect()->route('pembayaran-penghuni.index')->with('success', 'New payment has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item=User::find($id);
        $data=Payment::findOrFail($id);
        $tipe = DataPenghuni::where('id_penghuni', auth()->user()->id)->first();

        return view('pages.penghuni.payment.show', compact('item', 'data', 'tipe'));
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
        $kamar = Kamar::all();
        $item = Payment::findOrFail($id);
        $data=$request->all();

        if ($data['bukti_bayar'] == null){
            $data['status'] = 'Unggah Bukti Bayar';
        } else{
            $data['status'] = 'Menunggu Validasi';
        }

        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
        
            if ($file->isValid()) {
                $extension = $file->getClientOriginalExtension();
                $timestamp = now()->timestamp;
                $nama_file = $item['bulan'] . '.' . $item['tahun'] . '.' . $item['id_user'] . '.' . $timestamp . '.' . $extension;
        
                $data['bukti_bayar'] = $file->storeAs('assets/buktiBayar', $nama_file, 'public');
            } 
        } else {
            $data['bukti_bayar'] = null;
        }

        $item->update($data);
        
        $id_kamar = $kamar->id;
        $kamar =   Kamar::find($id_kamar);
        if ($data == 'Lunas') {
            $kamar->status = 'Tidak tersedia';
            $kamar->update();
        }
        

        return redirect()->route('pembayaran-penghuni.index')->with('success', 'New payment has been added!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}