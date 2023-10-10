<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DataPenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (request()->ajax()) {
            // $query = User::query();
            $query = User::where('role', 'penghuni');

            return datatables()->of($query)
                ->addIndexColumn()
                
                ->editColumn('name', function ($item) {
                    return $item->name ?? '-';
                })
                ->editColumn('email', function ($item) {
                    return $item->email ?? '-';
                })
                ->editColumn('tempat_lahir', function ($item) {
                    return $item->tempat_lahir ?? '-';
                })
                ->editColumn('tanggal_lahir', function ($item) {
                    return $item->tanggal_lahir ?? '-';
                })
                ->editColumn('role', function ($item) {
                    return $item->role ?? '-';
                })
                ->editColumn('status_akun', function ($item) {
                    return $item->status_akun ?? '-';
                })
                ->editColumn('alamat', function ($item) {
                    return $item->alamat ?? '-';
                })
                ->editColumn('hp', function ($item) {
                    return $item->hp ?? '-';
                })
                ->editColumn('wali', function ($item) {
                    return $item->wali ?? '-';
                })
                ->editColumn('hp2', function ($item) {
                    return $item->hp2 ?? '-';
                })
                ->editColumn('uname', function ($item) {
                    return $item->uname ?? '-';
                })
                ->editColumn('id_telegram', function ($item) {
                    return $item->id_telegram ?? '-';
                })
                ->editColumn('mac_addr', function ($item) {
                    return $item->mac_addr ?? '-';
                })
                ->editColumn('dokumen', function ($item) {
                    return $item->dokumen ?? '-';
                })
                ->editColumn('fasilitas', function ($item) {
                    return $item->fasilitas ?? '-';
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
        // untuk mengubah bagian create nya
        return view('pages.admin.datapenyewa.create', compact('item'));
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
        $item->uname=$request->uname;
        $item->password=$request->password;
        $item->id_telegram=$request->id_telegram;
        $item->mac_addr=$request->mac_addr;
        // $item->dokumen=$request->dokumen;
        // $item->fasilitas=$request->fasilitas;

        // untuk KTP
        if ($request->hasFile('dokumen')) {
            if (Auth::user()->dokumen != null) {
                Storage::disk('public')->delete(Auth::user()->dokumen);
                $item['dokumen'] = $request->file('dokumen')->store('assets/penyewa/dokumen-ktp', 'public');
            } else {
                $item['dokumen'] = $request->file('dokumen')->store('assets/penyewa/dokumen-ktp', 'public');
            }
        }

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
        $item=User::find($id);
        return view('pages.admin.datapenyewa.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = User::findOrFail($id);
        // untuk menampilkan ke halaman edit nya
        return view('pages.admin.datapenyewa.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = User::findOrFail($id);

        if ($request->hasFile('dokumen')) {
            if (Auth::user()->dokumen != null) {
                Storage::disk('public')->delete(Auth::user()->dokumen);
                $dokumen = $request->file('dokumen')->store('assets/penyewa/dokumen-ktp', 'public');
            } else {
                $dokumen = $request->file('dokumen')->store('assets/penyewa/dokumen-ktp', 'public');
            }
        } else {
            $dokumen = $item->dokumen;
        }

        // untuk fasilitas
        // Ambil data dari form
        $fasilitasArray = $request->input('fasilitas', []);

        // Gabungkan data menjadi satu string
        $fasilitasString = implode(',', $fasilitasArray);


        $item->update([
            'nama'=>$request->name,
            'tempat_lahir'=>$request->tempat_lahir,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'role'=>$request->role,
            'status_akun'=>$request->status_akun,
            'alamat'=>$request->alamat,
            'hp'=>$request->hp,
            'wali'=>$request->wali,
            'hp2'=>$request->hp2,
            'uname'=>$request->uname,
            'id_telegram'=>$request->id_telegram,
            'mac_addr'=>$request->mac_addr,
            'dokumen'=>$dokumen,
            'fasilitas'=>$fasilitasString
        ]);

        return redirect()->route('data-penyewa.index')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $item = User::findOrFail($request->id);
        $item->delete();

        if ($item) {
            return Response()->json(['status' => true, 'message' => 'Data berhasil dihapus!']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Data gagal dihapus!']);
        }
    }
}
