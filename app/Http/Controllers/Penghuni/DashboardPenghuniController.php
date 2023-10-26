<?php

namespace App\Http\Controllers\Penghuni;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardPenghuniController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $item=User::find(auth()->user()->id);

        // untuk mentotalkan jumlah transaksi yang sudah dilakukan
        $jumlahTransaksi = Payment::where('id_user', $userId)->sum('harga_bayar');

        // Menghitung jumlah total transaksi berdasarkan ID penghuni
        $totalTransaksi = Payment::where('id_user', auth()->user()->id)->count();

        $riwayatPembayaranTerakhir = Payment::latest()
            ->where('id_user', auth()->user()->id)
            ->first();

        return view('pages.penghuni.dashboard', compact('jumlahTransaksi', 'totalTransaksi', 'item', 'riwayatPembayaranTerakhir'));
    }
    
}
