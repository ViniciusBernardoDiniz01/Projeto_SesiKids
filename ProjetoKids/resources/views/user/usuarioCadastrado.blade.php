<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/usuariosCadastrados.css') }}">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="{{route('user.login')}}" class="link">Voltar</a>
        <h1 class="h1-titulo">Bem-vindo à página Admin</h1>
    </header>
    <div class="body">
    <footer>
        @if (session("sucess"))
        <p style="color: #0f0">
            {{ session("sucess") }}
        </p>
        @endif
        @forelse($users as $Sist)
        <div class="fotterall">
        <div class="text">
        <span>ID: {{ $Sist->id }}<br></span>
        <span>Nome: {{ $Sist->name }}<br></span>
        <span>E-mail: {{ $Sist->email }}<br></span>
        </div>
        <div class="botaos">
        <a href="{{ route('user.show', ['user'=> $Sist->id ])}}" id="boston-1" class="boston">Visualizar</a>
        <a href="{{ route('user.edit', ['user'=> $Sist->id ])}}" id="boston-2" class="boston">Editar</a>
        <form action="{{ route('user.destroy', ['user'=> $Sist->id ])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="boston" onclick="return confirm('Tem certeza que deseja deletar usuario ?')">Excluir</button>
        </form>
        </div>
        </div>
        <hr>
        @empty
        @endforelse
    </footer>
</div>
</body>
</html>
