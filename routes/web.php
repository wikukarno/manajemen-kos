<?php

use App\Models\Kamar;
use App\Models\DataUser;
use App\Models\TipeKamar;
use App\Models\Availability;
use Database\Factories\KamarFactory;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\detailKamar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\TipeKamarController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\User\AkunUserController;
use App\Http\Controllers\Admin\DataUserController;
use App\Http\Controllers\Admin\AkunAdminController;
use App\Http\Controllers\Admin\DataKamarController;
use App\Http\Controllers\Admin\DataPenyewaController;
use App\Http\Controllers\Penghuni\PaymentsController;
use App\Http\Controllers\Penghuni\SewaKamarController;
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\DataPembayaranController;
use App\Http\Controllers\Penghuni\AkunPenghuniController;
use App\Http\Controllers\Penghuni\FormPenghuniController;
use App\Http\Controllers\Penghuni\FormPembayaranController;
use App\Http\Controllers\Penghuni\DahsboardPenghuniController;
use App\Http\Controllers\Admin\TipeKamarController as AdminTipeKamarController;
use App\Http\Controllers\AkunPendaftarController;
use App\Http\Controllers\PemesananIsiDataController;
use App\Http\Controllers\Penghuni\DataPenghuniController;
use App\Http\Controllers\Penghuni\FasilitasPenghuniController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('auth.login');
});

//home
Route::get('/', [KamarController::class, 'index'])->name('home');
//kamar tersedia
Route::get('/availability', [AvailabilityController::class, 'index'])->name('availabality');
//detail kamar
Route::get('/availability/detail-kamar/{slug}', [detailKamar::class, 'index'])->name('detail');

Route::resource('isi-data', PemesananIsiDataController::class);
Route::delete('isi-data', [PemesananIsiDataController::class, 'destroy']);


// Route::resource('pembayaran-awal', DataPenghuniController::class);

// tipe kamar
Route::get('/detail-tipe/{tipe}', [TipeKamarController::class, 'detailTipe'])->name('detailTipe');
//akun
Route::resource('akun-pendaftar', AkunPendaftarController::class);

                                                         



Route::prefix('pemilik')
->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/akun', [AkunAdminController::class, 'index'])->name('akun.admin');
        Route::resource('akun-admin', AkunAdminController::class);
        // untuk DataUser
        Route::resource('data-user', DataUserController::class);
        Route::delete('data-user/delete', [DataUserController::class, 'destroy']);
        // untuk DataPenghuni
        Route::resource('data-penyewa', DataPenyewaController::class);
        Route::delete('data-penyewa/delete', [DataPenyewaController::class, 'destroy']);
        // untuk DataKamar
        Route::resource('data-kamar', DataKamarController::class);
        Route::delete('data-kamar/delete', [DataKamarController::class, 'destroy']);
        // untuk TipeKamar
        Route::resource('tipe-kamar', AdminTipeKamarController::class);
        Route::delete('tipe-kamar/delete', [AdminTipeKamarController::class, 'destroy']);
        // untuk slug tipe kamar
        Route::get('/pemilik/tipe-kamar/checkSlug', [AdminTipeKamarController::class, 'checkSlug'])->middleware('auth');
        // untuk DataPembayaran
        Route::resource('data-pembayaran', DataPembayaranController::class);
        Route::delete('data-pembayaran/delete', [DataPembayaranController::class, 'destroy']);

    });

Route::prefix('pendaftar')
->middleware(['auth', 'user'])
    ->group(function () {
        Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('user.dashboard');
        Route::get('/akun', [AkunUserController::class, 'index'])->name('akun.user');
        // Route::resource('akun-pendaftar', AkunUserController::class);
    });

Route::prefix('penghuni')
->middleware(['auth', 'penghuni'])
    ->group(function () {
        Route::get('/dashboard', [DahsboardPenghuniController::class, 'index'])->name('penghuni.dashboard');
        Route::get('/akun', [AkunPenghuniController::class, 'index'])->name('akun.penghuni');
        Route::resource('akun-penghuni', AkunPenghuniController::class);
        Route::resource('form-penghuni', FormPenghuniController::class);
        Route::resource('pembayaran-penghuni', PaymentsController::class);
        Route::resource('fasilitas-penghuni', FasilitasPenghuniController::class)->middleware('belumverifikasi');
    });



Auth::routes();