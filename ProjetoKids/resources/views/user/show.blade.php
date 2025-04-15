<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="input">
    <div class="butoes">
    <a href="{{ route('user.usuarioCadastrado') }}">
    Voltar
    </a>
    
    <a href="{{ route('user.edit', ['user'=> $user->id ])}}" class="boston">Editar</a>

    <form action="{{ route('user.destroy', ['user'=> $user->id ])}}" method="POST" style="margin: 0; padding: 0;">
        @csrf
        @method('DELETE')
        <button type="submit" class="boston" onclick="return confirm('Tem certeza que deseja deletar usuario?')">Excluir</button>
    </form>
    </div>
    <h1>Visualizar Usuário</h1>

    @if (session("sucess"))
        <p style="color: #0f0">
            {{ session("sucess") }}
        </p>
    @endif

    ID: {{ $user->id }}<br>
    Nome: {{ $user->name }}<br>
    E-mail: {{ $user->email }}<br>
    
    Cadastrado em: {{\Carbon\Carbon::parse($user->created_at)->format('d/m/y H:i:s') }}<br>
    Atualizado em: {{\Carbon\Carbon::parse($user->updated_at)->format('d/m/y H:i:s') }}<br>
</div>
</body>
</html>


