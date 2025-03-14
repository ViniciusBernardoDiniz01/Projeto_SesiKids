<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('user.index');

Route::get('/create-user', [UserController::class, 'create'])->name('user.create');

Route::post('/store-user', [UserController::class, 'store'])->name('user.store');

Route::get('/jogos-user', [UserController::class, 'jogos'])->name('user.jogos');

Route::get('/login-user', [UserController::class, 'usuarios'])->name('user.login');