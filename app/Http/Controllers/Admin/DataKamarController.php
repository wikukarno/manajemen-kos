<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use Illuminate\Http\Request;

class DataKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Kamar::query();
            // $query = User::where('role', 'pendaftar');

            return datatables()->of($query)
                ->addIndexColumn()
                
                ->editColumn('nomor_kamar', function ($item) {
                    return $item->nomor_kamar ?? '-';
                })
                ->editColumn('id_tipe', function ($item) {
                    return $item->id_tipe ?? '-';
                })
                ->editColumn('deskripsi', function ($item) {
                    return $item->deskripsi ?? '-';
                })
                ->editColumn('status', function ($item) {
                    return $item->status ?? '-';
                })
                ->editColumn('slug', function ($item) {
                    return $item->slug ?? '-';
                })
                ->editColumn('harga', function ($item) {
                    return $item->harga ?? '-';
                })
                ->editColumn('action', function ($item) {
                    return '
                                <div class="d-flex">
                                    <a href="' . route('data-kamar.show', $item->id) . '" title="Tampil Detail" class="btn btn-outline-primary btn-sm mb-0 mx-1 ">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="' . route('data-kamar.edit', $item->id) . '" title="Edit Data" class="btn btn-outline-warning btn-sm mb-0 mx-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger btn-sm mb-0 mx-1" title="Delete" onClick="btnDeleteDataKamar(' . $item->id . ')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div> 
                            ';

                })
                // memenghilangkan tag html
                ->rawColumns(['action'])
                ->make(true);
        }

        $item=Kamar::find(auth()->user()->id);
        return view('pages.admin.datakamar.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item=Kamar::all();
        // untuk mengubah bagian create nya
        return view('pages.admin.datakamar.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // untuk mengengisi data nya
        $item=new Kamar();
        $item->nomor_kamar=$request->nomor_kamar;
        $item->id_tipe=$request->id_tipe;
        $item->deskripsi=$request->deskripsi;
        $item->status=$request->status;
        $item->slug=$request->slug;
        $item->harga=$request->harga;
        $item->save();

        return redirect('pemilik/data-kamar')->with('success', 'Data Hass Been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item=Kamar::find($id);
        // untuk mengubah bagian create nya
        return view('pages.admin.datakamar.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Kamar::findOrFail($id);
        // untuk menampilkan ke halaman edit nya
        return view('pages.admin.datakamar.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = Kamar::findOrFail($id);
        $item->update([
            'nomor_kamar'=>$request->nomor_kamar,
            'id_tipe'=>$request->id_tipe,
            'deskripsi'=>$request->deskripsi,
            'status'=>$request->status,
            'slug'=>$request->slug,
            'harga'=>$request->harga
        ]);

        return redirect()->route('data-kamar.index')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $item = Kamar::findOrFail($request->id);
        $item->delete();

        if ($item) {
            return Response()->json(['status' => true, 'message' => 'Data berhasil dihapus!']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Data gagal dihapus!']);
        }
    }
}
