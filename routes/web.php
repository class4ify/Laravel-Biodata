<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bioController;
use App\Http\Controllers\lgController;
use App\Http\Controllers\rgController;
use App\Http\Controllers\pfController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// LOGIN
Route::get('/', function () {
    return view('auth.login.login');
})->name('login');
Route::post('/logauth', [lgController::class, 'Login']);

// LOGOUT
Route::get('/logout', function () {
    auth::logout();
    return redirect('/');
});

// REGISTER
Route::get('/tambahReg', function () {
    return view('auth.register.rgTambah');
});
Route::post('/simpanDataReg', [rgController::class, 'simpanDataReg']);

Route::middleware(['auth'])->group(function () {
    // BIODATA
    Route::get("/tambah", function () {
        return view("pages.tambah");
    });
    Route::post('/tambahBio', [bioController::class, 'tambahBio']);
    Route::get('/data', [bioController::class, 'index']);
    Route::get('/ubah/{id}', [bioController::class, 'ubah']);
    Route::PUT('/ubahbio/{id}', [bioController::class, 'ubahBio']);
    Route::delete('/hapus/{id}', [bioController::class, 'hapusBio'])->name('hapus');
    Route::get('/search', [bioController::class, 'search']);
    // REGISTER
    Route::get('/dataReg', [rgController::class, 'indexReg']);
    Route::get('/ubahReg/{id}', [rgController::class, 'ubahReg']);
    Route::PUT('/ubahDataReg/{id}', [rgController::class, 'ubahDataReg']);
    Route::delete('/hapusReg/{id}', [rgController::class, 'hapusDataReg'])->name('hapusReg');
    Route::get('/searchReg', [rgController::class, 'searchReg']);
    // PROFILE
    Route::get('/profile', [pfController::class, 'profile']);
});
