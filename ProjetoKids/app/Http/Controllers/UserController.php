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

    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Validação dos dados
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id, // Ignora o e-mail atual do usuário
        'password' => 'nullable|string|min:6|confirmed', // Senha é opcional
    ], [
        'email.unique' => 'Este email já está cadastrado.',
        'password.confirmed' => 'As senhas não conferem.',
    ]);

    // Atualização dos dados do usuário
    $user->update([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password,
    ]);

    return redirect()->route('user.show', $user->id)->with('success', 'Usuário atualizado com sucesso!');
}

    public function usuarios(){
        $users = User::all(); // Obter todos os usuários
        return view("user.usuarios", ['users' => $users]);
    }

    public function store(UserRequest $request){ 
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // Validação para confirmar senha
        ]);
    
        // Criação do usuário
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
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

