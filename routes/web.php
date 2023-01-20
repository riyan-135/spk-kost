<?php

use App\Http\Controllers\Admin\KostController;
use App\Http\Controllers\Admin\kriteriaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\User\AlternativeController;
use App\Http\Controllers\User\AuthController;
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
