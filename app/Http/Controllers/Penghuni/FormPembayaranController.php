<?php

namespace App\Http\Controllers\Penghuni;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FormPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $item = Auth::user();
        // $pembayarans = $item->payments;
        // return view('pages.penghuni.formPembayaran', compact('pembayarans', 'item'));

        $item=User::find(auth()->user()->id);
        $pembayarans = $item->payments;
        return view('pages.penghuni.formPembayaran', compact('pembayarans', 'item'));
        
        // $pembayarans = Payment::where('id_user', $item->id)->get();
        // return view('pages.penghuni.formPembayaran', compact('pembayarans', 'item'));
        // return view('pages.penghuni.formPembayaran', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['bukti_bayar'] = $request->file('bukti_bayar')->store(
            'assets/buktiBayar', 'public'
        );
        Payment::create($data);
        
        return redirect()->route('form-pembayaran-penghuni.index')->with('success', 'Kategori Berhasil Ditambahkan!');

        // $request->validate([
        //     'masa' => 'required',
        //     'jumlah' => 'required|numeric',
        //     'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif',
        // ]);

        // // Upload bukti bayar
        // $buktiBayarPath = $request->file('bukti_bayar')->store('bukti_bayar');

        // Payment::create([
        //     'masa' => $request->masa,
        //     'jumlah' => $request->jumlah,
        //     'bukti_bayar' => $buktiBayarPath,
        // ]);

        // return redirect()->route('form-pembayaran-penghuni.index')
        //     ->with('success', 'Pembayaran berhasil disimpan.');
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
