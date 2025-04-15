<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        return view("user.create");
    }

    public function jogos(){
        return view("user.jogos");
    }
    public function show(User $user){
        return view("user.show", ['user' => $user]);
    }

    public function usuarioCadastrado(){
        $users = User::all(); // Obter todos os usuários
        return view("user.usuarioCadastrado", ['users' => $users]);
    }

    public function edit(User $user){
        return view("user.edit", ['user' => $user]);
    }

    public function update(UserRequest $request, User $user){
        $request->validated();

        // edita o usuário no banco de dados
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);
        
        return redirect()->route('user.login')->with("success", "Usuario atualizado");
    }

    public function usuarios(){
        $users = User::all(); // Obter todos os usuários
        return view("user.usuarios", ['users' => $users]);
    }

    public function store(UserRequest $request){ 
        $request->validated(); 

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);

        return redirect()->route('user.login')->with("success", "Usuario cadastrado");
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('user.usuarioCadastrado')->with("success", "Usuario deletado");
    }

    public function index(){
        $users = User::orderByDesc('id')->get();

        return view('user.index', ['users' => $users]);
    }
}

