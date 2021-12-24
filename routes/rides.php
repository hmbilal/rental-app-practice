<?php

use App\Http\Controllers\RideController;
use Illuminate\Support\Facades\Route;

Route::get('/rides', [RideController::class, 'index'])->name('dashboard.rides');
Route::get('/rides/create', [RideController::class, 'create'])->name('dashboard.rides.create');
Route::post('/rides', [RideController::class, 'store'])->name('dashboard.rides.store');
Route::get('/rides/edit/{id}', [RideController::class, 'edit'])->name('dashboard.rides.edit');
Route::put('/rides/{id}', [RideController::class, 'update'])->name('dashboard.rides.update');
Route::get('/rides/delete/{id}', [RideController::class, 'destroy'])->name('dashboard.rides.delete');
