<?php

namespace App\Http\Controllers\Penghuni;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;

class DahsboardPenghuniController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $item=User::find(auth()->user()->id);

        // untuk mentotalkan jumlah transaksi yang sudah dilakukan
        $jumlahTransaksi = Payment::where('id_user', $userId)->sum('harga_bayar');

        // Menghitung jumlah total transaksi berdasarkan ID penghuni
        $totalTransaksi = Payment::where('id_user', auth()->user()->id)->count();

        return view('pages.penghuni.dashboard', compact('jumlahTransaksi', 'totalTransaksi', 'item'));
    }
}
