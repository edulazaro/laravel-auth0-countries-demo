<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\CountryController;

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/dashboard', [MainController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/countries', [CountryController::class, 'index'])->middleware(['auth', 'verified'])->name('countries');