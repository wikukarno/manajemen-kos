<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Penghuni\DahsboardPenghuniController;
use App\Http\Controllers\User\DashboardUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

// ini  route untuk pemilik
Route::prefix('pemilik')
->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
    });

// ini  route untuk pendaftar
Route::prefix('pendaftar')
->middleware(['auth', 'user'])
    ->group(function () {
        Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('user.dashboard');
    });

// ini  route untuk penghuni
Route::prefix('penghuni')
->middleware(['auth', 'penghuni'])
    ->group(function () {
        Route::get('/dashboard', [DahsboardPenghuniController::class, 'index'])->name('penghuni.dashboard');
    });

Auth::routes();

