<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;


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

Route::prefix('/')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboards-index');
});

Route::prefix('/clientes')->group(function() {
    Route::get('/', [ClienteController::class, 'index'])->name('clientes-index');
    Route::get('/create', [ClienteController::class, 'create'])->name('clientes-create');
    Route::post('/', [ClienteController::class, 'store'])->name('clientes-store');
    Route::get('/{id}edit', [ClienteController::class, 'edit'])->where('id', '[0-9]+')->name('clientes-edit');
    Route::put('/{id}', [ClienteController::class, 'update'])->where('id', '[0-9]+')->name('clientes-update');
    Route::delete('/{id}', [ClienteController::class, 'destroy'])->where('id', '[0-9]+')->name('clientes-destroy');
});


