<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataRumahController;
use App\Http\Controllers\PengajuanController;

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


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/dashboard_penghuni', DashboardController::class);
    Route::resource('dashboard', DashboardController::class)->middleware(['auth', 'verified']);
    Route::resource('/type_rumah', TypeController::class);
    Route::resource('/penghuni', PenghuniController::class)->Middleware('admin');
    Route::resource('/data_rumah', DataRumahController::class);
    Route::resource('/pengajuan', PengajuanController::class);

    
});

require __DIR__ . '/auth.php';
