<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;

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

    public function usuarioCadastrado(request $request){

        //verifica e seleciona os usuarios procurados

        $users = User::when($request->has('name'), function($whenQuery) use ($request){
            $whenQuery->where('name', 'like', "%" . $request->name . "%");
        })
        ->when($request->has('email'), function($whenQuery) use ($request){
            $whenQuery->where('email', 'like', "%". $request->email ."%");
        })
        ->orderByDesc('id')
        ->paginate(null)
        ->withQueryString();
        // $users = User::all(); // Obter todos os usuários
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

    $imageName = $user->image; // Mantém a imagem atual

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $requestImage = $request->file('image');

        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        $requestImage->move(public_path('IMG/'), $imageName);
        }

    // Atualização dos dados do usuário
    $user->update([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password,
        'image' => $imageName,
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

        return redirect()->route('login')->with("success", "Usuario cadastrado");
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('user.usuarioCadastrado')->with("success", "Usuario deletado");
    }

    public function index(){
        $users = User::orderByDesc('id')->get();

        return view('user.index', ['users' => $users]);
    }

    public function generatePdf(Request $request)
    {
        $users = User::when($request->has('name'), function ($whenQuery) use ($request){
            $whenQuery->where('name', 'like', '%' . $request->name . '%');
        })
            ->when($request->has('email'), function ($whenQuery) use ($request){
                $whenQuery->where('email', 'like', '%' . $request->email . '%');
            })
            ->when($request->filled('start_date_registration'), function ($whenQuery) use ($request){
                $whenQuery->where('create_at', '>=', \Carbon\Carbon::parse($request->start_date_registration)->format('Y-m-d H:i:s'));
            })
            ->when($request->filled('end_date_registration'), function ($whenQuery) use ($request){
                $whenQuery->where('create_at', '<=', \Carbon\Carbon::parse($request->end_date_registration)->format('Y-m-d H:i:s'));
            })
            ->orderBy('created_at')
            ->get();

        $totalRecords = $users->count('id');

        $numberRecordsAllowed = 500;

        if($totalRecords > $numberRecordsAllowed){
            return redirect()->route('user.usuarioCadastrado', [
                'name' => $request->name,
                'email' => $request->email,
                'start_date_registration' => $request->start_date_registration,
                'end_date_registration' => $request->end_date_registration
            ])->with('error', "Limite de Registros ultrapassados para gerar um pdf. O limite é de $numberRecordsAllowed registros!");
        }

        $pdf = PDF::loadView('user.generate-pdf', ['users' => $users])->setPaper('a4', 'portrait');

        return $pdf->download('Pesquisa_users.pdf');
    }

public function comentarioPDF(Request $request)
{
    $users = User::when($request->has('name'), function ($whenQuery) use ($request){
            $whenQuery->where('name', 'like', '%' . $request->name . '%');
        })
            ->when($request->has('email'), function ($whenQuery) use ($request){
                $whenQuery->where('email', 'like', '%' . $request->email . '%');
            })
            ->when($request->filled('start_date_registration'), function ($whenQuery) use ($request){
                $whenQuery->where('create_at', '>=', \Carbon\Carbon::parse($request->start_date_registration)->format('Y-m-d H:i:s'));
            })
            ->when($request->filled('end_date_registration'), function ($whenQuery) use ($request){
                $whenQuery->where('create_at', '<=', \Carbon\Carbon::parse($request->end_date_registration)->format('Y-m-d H:i:s'));
            })
            ->orderBy('id')
            ->get();

        $totalRecords = $users->count('id');

        $numberRecordsAllowed = 500;

        if($totalRecords > $numberRecordsAllowed){
            return redirect()->route('user.usuarioCadastrado', [
                'name' => $request->name,
                'email' => $request->email,
                'start_date_registration' => $request->start_date_registration,
                'end_date_registration' => $request->end_date_registration
            ])->with('error', "Limite de Registros ultrapassados para gerar um pdf. O limite é de $numberRecordsAllowed registros!");
        }

        $pdf = PDF::loadView('user.comentario-pdf', ['users' => $users])->setPaper('a4', 'portrait');

        return $pdf->download('Pesquisa_users_cards.pdf');
    // $users = User::orderBy('id')->get(); // Busca todos os usuários
    // $pdf = PDF::loadView('user.comentario-pdf', ['users' => $users])->setPaper('a4', 'portrait');
    // return $pdf->download('comentarios-geral.pdf');
}
}

