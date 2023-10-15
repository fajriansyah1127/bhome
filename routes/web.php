<?php


use Illuminate\Support\Facades\Route;
use App\Models\Type;
use App\Models\Penghuni;
use App\Models\Datarumah;

use App\Http\Controllers\TypeController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\DataRumahController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::resource('/', DashboardController::class);
Route::resource('/type_rumah', TypeController::class);
Route::resource('/penghuni', PenghuniController::class);
Route::resource('/data_rumah', DataRumahController::class);