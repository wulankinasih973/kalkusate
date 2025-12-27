<?php

use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'))->name('home');

Route::get('/kalkulator', [KalkulatorController::class, 'index'])->name('kalkulator.index');
Route::post('/kalkulator/hitung', [KalkulatorController::class, 'hitung'])->name('kalkulator.hitung');
Route::post('/kalkulator/simpan', [KalkulatorController::class, 'simpan'])->name('kalkulator.simpan');

Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPdf'])->name('laporan.exportPdf');
Route::get('/laporan/export/csv', [LaporanController::class, 'exportCsv'])->name('laporan.export.csv');
Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');

Route::view('/about', 'about')->name('about');
