<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataPeminjamController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\Authenticate;

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
//     return view('login/login');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login-store', [LoginController::class, 'login'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('isLogin');

// Route::get('/data_peminjam', [DataPeminjamController::class, 'index'])->name('data_peminjam');
// Route::get('/data_peminjam/create', [DataPeminjamController::class, 'create'])->name('data_peminjam.create');

Route::resource('data_peminjam', DataPeminjamController::class);
