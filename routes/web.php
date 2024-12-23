<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Pages\Laporan;
use App\Filament\Resources\DosenResource;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MakulController;
use App\Http\Controllers\MahasiswaController;





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
    return view('welcome');
Route::get('/admin/laporan', App\Filament\Pages\Laporan::class);
Route::resource('dosens', DosenResource::class);
Route::get('/admin/dosens/{record}/edit', DosenResource\Pages\EditDosen::class)->name('dosen.edit');
Route::delete('/admin/dosens/{record}', DosenResource\Pages\DeleteDosen::class)->name('dosen.delete');

Route::get('admin/laporan', [LaporanController::class, 'index'])->name('laporan.index');

Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
Route::delete('/makul/{id}', [MakulController::class, 'destroy'])->name('makul.destroy');
Route::delete('/dosen/{id}', [LaporanController::class, 'destroy'])->name('dosen.destroy');
Route::get('dosens/{id}/edit', [DosenController::class, 'edit'])->name('dosens.edit');












});
