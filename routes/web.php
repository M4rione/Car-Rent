<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class,'store'])->name('register.store');
Route::get('login', [LoginController::class,'index'])->name('login');
Route::post('login', [LoginController::class,'process'])->name('login.process');
Route::get('logout', [LoginController::class,'logout'])->name('logout');