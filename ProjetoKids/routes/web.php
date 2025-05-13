<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//login

Route::get('/professor', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/create-user-login', [LoginController::class, 'create'])->name('login.create-user');
Route::post('/storage-create', [LoginController::class, 'store'])->name('login.storage');

//logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login')->with('success', 'Logout realizado com sucesso!');
})->name('logout');

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('/jogos-user', [UserController::class, 'jogos'])->name('user.jogos');



Route::group(['middleware' => 'auth'], function () {


Route::get('/cadastrados-user', [UserController::class, 'usuarioCadastrado'])->name('user.usuarioCadastrado');

// esta rota é para mostrar o usuário
Route::get('/show-user/{user}', [UserController::class, 'show'])->name('user.show');

// esta rota é para editar o usuário
Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
// esta rota é para atualizar o usuário
Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update');
//rota para deletar o usuário
Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/generate-pdf-user', [UserController::class, 'generatePDF'])->name('user.generate-pdf');

});