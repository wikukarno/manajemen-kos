<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipeKamar;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class TipeKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = TipeKamar::query();
            // $query = User::where('role', 'pendaftar');

            return datatables()->of($query)
                ->addIndexColumn()
                
                ->editColumn('name', function ($item) {
                    return $item->name ?? '-';
                })
                ->editColumn('slug', function ($item) {
                    return $item->slug ?? '-';
                })
                ->editColumn('detail', function ($item) {
                    return $item->detail ?? '-';
                })
                ->editColumn('harga', function ($item) {
                    return $item->harga ?? '-';
                })
                ->editColumn('action', function ($item) {
                    return '
                                <div class="d-flex">
                                    <a href="' . route('tipe-kamar.show', $item->id) . '" title="Tampil Detail" class="btn btn-outline-primary btn-sm mb-0 mx-1 ">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="' . route('tipe-kamar.edit', $item->id) . '" title="Edit Data" class="btn btn-outline-warning btn-sm mb-0 mx-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </div> 
                            ';

                })
                // memenghilangkan tag html
                ->rawColumns(['action'])
                ->make(true);
        }

        $item=TipeKamar::all();
        return view('pages.admin.tipekamar.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item=TipeKamar::all();
        // untuk mengubah bagian create nya
        return view('pages.admin.tipekamar.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // untuk mengengisi data nya
        $item=new TipeKamar();
        $item->name=$request->name;
        $item->slug=$request->slug;
        $item->detail=$request->detail;
        $item->harga=$request->slug;
        
        $item->save();

        return redirect('pemilik/tipe-kamar')->with('success', 'Data Hass Been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item=TipeKamar::find(auth()->user()->id);
        return view('pages.admin.tipekamar.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = TipeKamar::findOrFail($id);
        // untuk menampilkan ke halaman edit nya
        return view('pages.admin.tipekamar.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = TipeKamar::findOrFail($id);
        $item->update([
            'name'=>$request->name,
            'slug'=>$request->slug,
            'detail'=>$request->detail,
            'harga'=>$request->harga
        ]);

        return redirect()->route('tipe-kamar.index')->with('success', 'Data has been updated!');

        // $data=$request->all();
        // $item = TipeKamar::findOrFail($id);

        // $item->update($data);
        // return redirect()->route('tipe-kamar.index')->with('success', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * untuk mengecek slug
     */
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(TipeKamar::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
        
    }

    
}