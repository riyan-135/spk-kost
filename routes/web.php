<?php

use App\Http\Controllers\Admin\KostController;
use App\Http\Controllers\Admin\kriteriaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JarakController;
use App\Http\Controllers\LuasKamarController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\User\AlternativeController;
use App\Http\Controllers\User\AuthController;
use App\Models\Fasilitas;
use App\Models\Harga;
use App\Models\Kost;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth/login');
});

Route::prefix('user')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('kost', [KostController::class, 'index'])->name('kost.index')->middleware('is_admin');
Route::get('kost/create', [KostController::class, 'create'])->name('kost.create')->middleware('is_admin');
Route::post('store/kost', [KostController::class, 'store'])->name('store.kost');
Route::get('show/kost/{id}', [KostController::class, 'show'])->name('show.kost');
Route::post('update/kost/{id}', [KostController::class, 'update'])->name('update.kost');
Route::delete('delete/kost/{id}', [KostController::class, 'delete'])->name('delete.kost');

Route::get('kriteria', [kriteriaController::class, 'index']);
Route::get('kriteria/create', [kriteriaController::class, 'create']);
Route::post('kriteria/store', [kriteriaController::class, 'store']);
Route::get('/kriteria/{id}', [kriteriaController::class, 'show']);
Route::post('/kriteria/update/{id}', [kriteriaController::class, 'update']);
Route::delete('/kriteria/delete/{id}', [kriteriaController::class, 'delete']);

Route::get('fasilitas', [FasilitasController::class, 'index']);
Route::get('fasilitas/create', [FasilitasController::class, 'create']);
Route::post('fasilitas/store', [FasilitasController::class, 'store']);
Route::get('/fasilitas/{id}', [FasilitasController::class, 'show']);
Route::post('/fasilitas/update/{id}', [FasilitasController::class, 'update']);
Route::delete('/fasilitas/delete/{id}', [FasilitasController::class, 'destroy']);

Route::get('harga', [HargaController::class, 'index']);
Route::get('harga/create', [HargaController::class, 'create']);
Route::post('harga/store', [HargaController::class, 'store']);
Route::get('/harga/{id}', [HargaController::class, 'show']);
Route::post('/harga/update/{id}', [HargaController::class, 'update']);
Route::delete('/harga/delete/{id}', [HargaController::class, 'destroy']);

Route::get('jarak', [JarakController::class, 'index']);
Route::get('jarak/create', [JarakController::class, 'create']);
Route::post('jarak/store', [JarakController::class, 'store']);
Route::get('/jarak/{id}', [JarakController::class, 'show']);
Route::post('/jarak/update/{id}', [JarakController::class, 'update']);
Route::delete('/jarak/delete/{id}', [JarakController::class, 'destroy']);

Route::get('luas', [LuasKamarController::class, 'index']);
Route::get('luas/create', [LuasKamarController::class, 'create']);
Route::post('luas/store', [LuasKamarController::class, 'store']);
Route::get('/luas/{id}', [LuasKamarController::class, 'show']);
Route::post('/luas/update/{id}', [LuasKamarController::class, 'update']);
Route::delete('/luas/delete/{id}', [LuasKamarController::class, 'destroy']);


Route::get('/user/dashboard', [HomeController::class, 'dashboard']);

Route::get('alternative', [AlternativeController::class, 'index']);
Route::post('alternative/store', [AlternativeController::class, 'store']);
Route::get('alternative/create', [AlternativeController::class, 'create']);
Route::get('alternative/show/{id}', [AlternativeController::class, 'show']);
Route::post('alternative/update/{id}', [AlternativeController::class, 'update']);
Route::delete('alternative/delete/{id}', [AlternativeController::class, 'delete']);

Route::get('/nilai', [NilaiController::class, 'index']);
Route::get('/nilai/{id}', [NilaiController::class, 'create']);
Route::post('/nilai/store/{id}', [NilaiController::class, 'store']);

Route::post('/logout', [LoginController::class, 'logout']);
