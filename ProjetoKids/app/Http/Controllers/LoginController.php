<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function loginProcess(LoginRequest $request)
    {
        $request->validated();

        $autenticated = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if (!$autenticated) {
            return back()->withInput()->with('error', 'Email ou senha inválidos');
        }

        $user = Auth::user();
        $user = User::find($user->id);

        return redirect()->route('user.index')->with('success', 'Login realizado com sucesso!')->with('user', $user);
        
    }
}
