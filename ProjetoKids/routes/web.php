<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/erro401', function () {
    abort(401);
});

Route::get('/erro503', function () {
    abort(503);
});

Route::get('/erro429', function () {
    abort(429);
});

Route::get('/erro404', function () {
    abort(404);
});

Route::get('/erro500', function () {
    abort(500);
});

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

Route::get('/painel', [UserController::class, 'painel'])->name('dashboard.index');


Route::get('/cadastrados-user', [UserController::class, 'usuarioCadastrado'])->name('user.usuarioCadastrado')->middleware('permission:cadastrados-user');

// esta rota é para mostrar o usuário
Route::get('/show-user/{user}', [UserController::class, 'show'])->name('user.show')->middleware('permission:show-user');

// esta rota é para editar o usuário
Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware('permission:edit-user');

// esta rota é para atualizar o usuário
Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update')->middleware('permission:edit-user');

//rota para deletar o usuário
Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('permission:destroy-user');

Route::get('/generate-pdf-user', [UserController::class, 'generatePDF'])->name('user.generate-pdf');

Route::get('/generate-pdf-comentario', [UserController::class, 'comentarioPDF'])->name('user.comentario-pdf');

});