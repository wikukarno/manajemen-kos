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
        $item=User::find(auth()->user()->id);
        // $payments = Payment::all();
        // return view('pages.penghuni.payment.index', compact('item'));
        // return view('pages.penghuni.payment.index', compact('payments', 'item'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['id_user'] = Auth::user()->id;
        $data['bukti_bayar'] = $request->file('bukti_bayar')->store(
            'assets/buktiBayar', 'public'
        );
        $data['tanggal_bayar'] = now();
        $data['bulan'] = implode(", ", $request->get('bulan'));
        Payment::create($data);
        
        return redirect()->route('form-pembayaran-penghuni.index')->with('success', 'Kategori Berhasil Ditambahkan!');
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
