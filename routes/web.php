<?php

use App\Models\kamar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\User\AkunUserController;
use App\Http\Controllers\Admin\DataUserController;
use App\Http\Controllers\Admin\AkunAdminController;
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Penghuni\AkunPenghuniController;
use App\Http\Controllers\Penghuni\FormPenghuniController;
use App\Http\Controllers\Penghuni\FormPembayaranController;
use App\Http\Controllers\Penghuni\DahsboardPenghuniController;
use App\Http\Controllers\Penghuni\SewaKamarController;

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

Route::get('/', function() {
    return view('kamar', [
        "kamar" => kamar::all()
    ]);
});



Route::prefix('pemilik')
->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/akun', [AkunAdminController::class, 'index'])->name('akun.admin');
        Route::resource('akun-admin', AkunAdminController::class);
        // untuk DataUser
        Route::resource('data-user', DataUserController::class);
    });

Route::prefix('pendaftar')
->middleware(['auth', 'user'])
    ->group(function () {
        Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('user.dashboard');
        Route::get('/akun', [AkunUserController::class, 'index'])->name('akun.user');
        Route::resource('akun-pendaftar', AkunUserController::class);
    });

Route::prefix('penghuni')
->middleware(['auth', 'penghuni'])
    ->group(function () {
        Route::get('/dashboard', [DahsboardPenghuniController::class, 'index'])->name('penghuni.dashboard');
        Route::get('/akun', [AkunPenghuniController::class, 'index'])->name('akun.penghuni');
        Route::resource('akun-penghuni', AkunPenghuniController::class);
        Route::resource('form-penghuni', FormPenghuniController::class);
        Route::resource('form-pembayaran-penghuni', FormPembayaranController::class);
        Route::resource('form-permintaan-penghuni', SewaKamarController::class);
    });

// Route::get('/kamar', [KamarController::class, 'show']);

Route::get('/', [KamarController::class, 'show']);






Auth::routes();