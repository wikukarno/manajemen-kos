<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataPenghuni;
use App\Models\Kamar;
use App\Models\Payment;
use App\Models\TipeKamar;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Mime\Part\DataPart;

class DataPenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (request()->ajax()) {
            // $query = User::query();
            $query = DataPenghuni::with('kamar','kamar.type', 'user')->get();

            return datatables()->of($query)
                ->addIndexColumn()
                
                ->editColumn('name', function ($item) {
                    return $item->user->name ?? '-';
                })
                ->editColumn('nama_tipe', function ($item) {
                    return $item->kamar->type->name ?? '-';
                })
                ->editColumn('nomor_kamar', function ($item) {
                    return $item->kamar->nomor_kamar ?? '-';
                })
                ->editColumn('harga_kamar', function ($item) {
                    return $item->kamar->harga ?? '-';
                })
                ->editColumn('email', function ($item) {
                    return $item->user->email ?? '-';
                })
                ->editColumn('tempat_lahir', function ($item) {
                    return $item->user->tempat_lahir ?? '-';
                })
                ->editColumn('tanggal_lahir', function ($item) {
                    return $item->user->tanggal_lahir ?? '-';
                })
                ->editColumn('role', function ($item) {
                    return $item->user->role ?? '-';
                })
                ->editColumn('status_akun', function ($item) {
                    return $item->user->status_akun ?? '-';
                })
                ->editColumn('alamat', function ($item) {
                    return $item->user->alamat ?? '-';
                })
                ->editColumn('hp', function ($item) {
                    return $item->user->hp ?? '-';
                })
                ->editColumn('wali', function ($item) {
                    return $item->user->wali ?? '-';
                })
                ->editColumn('hp2', function ($item) {
                    return $item->user->hp2 ?? '-';
                })
                ->editColumn('id_telegram', function ($item) {
                    return $item->user->id_telegram ?? '-';
                })
                ->editColumn('mac_addr', function ($item) {
                    return $item->user->mac_addr ?? '-';
                })
                ->editColumn('dokumen', function ($item) {
                    return $item->user->dokumen ?? '-';
                })
                ->editColumn('fasilitas', function ($item) {
                    return $item->user->fasilitas ?? '-';
                })
                ->editColumn('action', function ($item) {
                    return '
                                <div class="d-flex">
                                    <a href="' . route('data-penyewa.show', $item->id) . '" title="Tampil Detail" class="btn btn-outline-primary btn-sm mb-0 mx-1 ">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="' . route('data-penyewa.edit', $item->id) . '" title="Edit Data" class="btn btn-outline-warning btn-sm mb-0 mx-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger btn-sm mb-0 mx-1" title="Delete" onClick="btnDeleteDataPenyewa(' . $item->id . ')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div> 
                            ';

                })
                // memenghilangkan tag html
                ->rawColumns(['action'])
                ->make(true);
        }

        $item=User::find(auth()->user()->id);
        return view('pages.admin.datapenyewa.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item=User::find(auth()->user()->id);
        $nomor=DataPenghuni::where('id_penghuni', auth()->user()->id);
        $kamar=Kamar::all();
        $tipe=TipeKamar::all();

        return view('pages.admin.datapenyewa.create', compact('item','nomor','kamar','tipe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // untuk mengengisi data nya
        $item=new User();
        $item->name=$request->name;
        $item->email=$request->email;
        $item->tempat_lahir=$request->tempat_lahir;
        $item->tanggal_lahir=$request->tanggal_lahir;
        $item->role=$request->role;
        $item->status_akun=$request->status_akun;
        $item->alamat=$request->alamat;
        $item->hp=$request->hp;
        $item->wali=$request->wali;
        $item->hp2=$request->hp2;
        $item->password=$request->password;
        $item->id_telegram=$request->id_telegram;
        $item->mac_addr=$request->mac_addr;

        $item->dokumen = $request->file('dokumen')->store('assets/penyewa/dokumen-ktp', 'public');

        // untuk fasilitas
        // Ambil data dari form
        $fasilitasArray = $request->input('fasilitas', []);

        // Gabungkan data menjadi satu string
        $fasilitasString = implode(',', $fasilitasArray);

        // Buat record baru dalam tabel database
        $item->fasilitas = $fasilitasString;

        $item->save();

        return redirect('pemilik/data-penyewa')->with('success', 'Data Hass Been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=User::findOrFail($id);

        $kamar = DataPenghuni::where('id_penghuni', $user->id)->get();
        $penghuni = DataPenghuni::with(['kamar', 'user'])->findOrFail($id);


        return view('pages.admin.datapenyewa.show', compact('user','kamar','penghuni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $penghuni = DataPenghuni::with(['kamar', 'user'])->findOrFail($id);
        // $tipe_kamar = TipeKamar::orderBy('name', 'ASC')->get();
        // $query = Kamar::where('status', 'Tersedia');

        $tipe_kamar = TipeKamar::orderBy('name', 'ASC')->get();

        // $keyword = $request->query('id');
        // $nomor_kamar = $request->input('tipekamar');

        // $data = Kamar::where('nomor_kamar', $request->$nomor_kamar)->get();

        $query = Kamar::where('status', 'Tersedia')
            ->whereIn('nomor_kamar', $tipe_kamar->pluck('id'))
            ->whereIn('id_tipe', $tipe_kamar->pluck('id'))
            ->get();
            // dd($query);
        
        // untuk menampilkan ke halaman edit nya
        return view('pages.admin.datapenyewa.edit', compact('penghuni', 'tipe_kamar','query'));
    }

    public function getKamar(Request $request)
    {
        if (request()->ajax()) {
            try {
                $data = Kamar::where('id_tipe', $request->id)->first();

                $results = (['status' => true, 'data' => $data]);
            } catch (\Throwable $th) {
                $results = (['status' => false, 'message' => 'Terjadi kesalahan. ' . $th->getMessage()]);
            }
        } else {
            abort(404);
        }

        return response()->json($results);
    }

    public function getNomorKamar(Request $request)
    {
        $keyword = $request->query('id');

        $data = Kamar::where('nomor_kamar', $request->$keyword)->get();
        
        return response($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = DataPenghuni::findOrFail($id);
        
       // kode bag wiku
    //     if ($request->hasFile('dokumen')){
    //         if($item->dokumen != null){
    //             // dd($item->dokumen);
    //             Storage::disk('public')->delete($item->dokumen);
    //         }
    //         $newFile = $request->file('dokumen')->store('assets/penyewa/dokumen-ktp', 'public');
    //    } else {
    //         $oldFile = $item->dokumen;
    //    }

        // // untuk ktp
        // if ($request->hasFile('dokumen')) {
        //     if ($item->user->dokumen != null) {
        //         Storage::disk('public')->delete($item->user->dokumen);
        //         $dokumen = $request->file('dokumen')->store('assets/penyewa/dokumen-ktp', 'public');
        //     }
        //     // $dokumen = $request->file('dokumen')->store('assets/penyewa/dokumen-ktp', 'public');
        // }else{
        //     $dokumen = $item->user->dokumen;
        // }

        // // untuk fasilitas
        // // Ambil data dari form
        // $fasilitasArray = $request->input('fasilitas', []);
        // // Gabungkan data menjadi satu string
        // $fasilitasString = implode(',', $fasilitasArray);

        // Mengelola upload dokumen KTP
        if ($request->hasFile('dokumen')) {
            // Menghapus dokumen lama jika ada
            if ($item->user->dokumen != null) {
                Storage::disk('public')->delete($item->user->dokumen);
            }

            // Menyimpan dokumen baru
            $dokumen = $request->file('dokumen')->store('assets/penyewa/dokumen-ktp', 'public');
        } else {
            $dokumen = $item->user->dokumen; // Jika tidak ada perubahan, gunakan dokumen yang sudah ada
        }

        // Mengelola fasilitas
        $fasilitasArray = $request->input('fasilitas', []);
        $fasilitasString = implode(',', $fasilitasArray);

        $item->update([
            'nama' => $request->input('name'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'role' => $request->input('role'),
            'status_akun' => $request->input('status_akun'),
            'alamat' => $request->input('alamat'),
            'hp' => $request->input('hp'),
            'wali' => $request->input('wali'),
            'hp2' => $request->input('hp2'),
            'id_telegram' => $request->input('id_telegram'),
            'mac_addr' => $request->input('mac_addr'),
            'dokumen' => $dokumen, // Menyimpan nama file dokumen KTP baru
            'fasilitas' => $fasilitasString
        ]);

        // $item->update([
        //     'nama'=>$request->name,
        //     'tempat_lahir'=>$request->tempat_lahir,
        //     'tanggal_lahir'=>$request->tanggal_lahir,
        //     'role'=>$request->role,
        //     'status_akun'=>$request->status_akun,
        //     'alamat'=>$request->alamat,
        //     'hp'=>$request->hp,
        //     'wali'=>$request->wali,
        //     'hp2'=>$request->hp2,
        //     'id_telegram'=>$request->id_telegram,
        //     'mac_addr'=>$request->mac_addr,
        //     // 'dokumen'=>$oldFile ?? $newFile,
        //     'dokumen'=>$dokumen,
        //     'fasilitas'=>$fasilitasString
        // ]);

        return redirect()->route('data-penyewa.index')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $item = DataPenghuni::findOrFail($request->id);
        
        if ($item) {

            if($item->user->dokumen){
                Storage::disk('public')->delete($item->user->dokumen);
            }

            $item->user->delete();

            return Response()->json(['status' => true, 'message' => 'Data berhasil dihapus!']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Data gagal dihapus!']);
        }

        
    }

}
