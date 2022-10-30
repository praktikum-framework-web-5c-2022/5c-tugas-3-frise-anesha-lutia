<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;

Route::get('/', [DashboardController::class, 'index']);

Route::resources([
    'dosen' => DosenController::class,
    'mahasiswa' => MahasiswaController::class,
    'matakuliah' => MatakuliahController::class
]);
