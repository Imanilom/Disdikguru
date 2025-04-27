<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\GuruController;
use App\Models\Sekolah;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OperatorController;

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
    return view('dashboard');
})->middleware('auth');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('operator', OperatorController::class)->only(['index', 'create', 'store']);
});


Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'role:admin,operator'])->group(function () {
    Route::resource('sekolah', SekolahController::class);
    Route::resource('guru', GuruController::class);
    Route::delete('/guru/file/{id}', [\App\Http\Controllers\GuruController::class, 'deleteFile'])->name('guru.delete-file');
  
    
    

});


Route::get('/sekolah-by-kecamatan/{kecamatanId}', function ($kecamatanId) {
    $sekolahs = Sekolah::where('kecamatan_id', $kecamatanId)->get();
    return response()->json($sekolahs);
});

