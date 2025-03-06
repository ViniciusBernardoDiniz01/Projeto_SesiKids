<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('user.index');

Route::get('/create-user', [UserController::class,''])->name('user.create');

Route::get('/store-user', [UserController::class,'store'])->name('user-store');

route::get('/jogos-user', [UserController::class,'jogos'])->name('user.jogos');
