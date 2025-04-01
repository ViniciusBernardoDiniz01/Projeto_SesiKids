<?php

use App\Http\Controllers\RegistradosController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//registrados

Route::get('/table-user', [RegistradosController::class, 'create'])->name('registrados.index');



//user

Route::get('/', [UserController::class, 'index'])->name('user.index');

Route::get('/create-user', [UserController::class, 'create'])->name('user.create');

Route::post('/store-user', [UserController::class, 'store'])->name('user.store');

Route::get('/jogos-user', [UserController::class, 'jogos'])->name('user.jogos');

Route::get('/login-user', [UserController::class, 'usuarios'])->name('user.login');

Route::get('/cadastrados-user', [UserController::class, 'usuarioCadastrado'])->name('user.usuarioCadastrado');

// esta rota é para mostrar o usuário
Route::get('/show-user/{user}', [UserController::class, 'show'])->name('user.show');

// esta rota é para editar o usuário
Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
// esta rota é para atualizar o usuário
Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update');
//rota para deletar o usuário
Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');