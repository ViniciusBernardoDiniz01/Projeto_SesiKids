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

    public function index(){
        $users = User::orderByDesc('id')->get();

        return view('user.index', ['users' => $users]);
    }
}

