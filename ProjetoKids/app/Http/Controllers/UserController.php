<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view("user.index");
    }
    public function create(){
        return view("user.create");
    }
    public function jogos(){
        return view("user.jogos");
    }
    public function usuarios(){
        return view("user.usuarios");
    }
    public function store(UserRequest $request){
        $request->validated();

        User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> bcrypt($request->password),
        ]);

        return redirect()->route('user.jogos')->with("success","Usuario cadastrado");
    }
}

