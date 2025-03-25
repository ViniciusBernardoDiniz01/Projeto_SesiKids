<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="butoes">
    <a href="{{ route('user.login') }}" 
    style="background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 22px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 0px;
    cursor: pointer;
    border-radius: 12px;
    ">
    Voltar
    </a>
    
    <a href="{{ route('user.edit', ['user'=> $user->id ])}}" class="boston" style="background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 10px 22px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 2px 0px;
        cursor: pointer;
        border-radius: 12px;
        ">Editar</a>

    <form action="{{ route('user.destroy', ['user'=> $user->id ])}}" method="POST" style="margin: 0; padding: 0;">
        @csrf
        @method('DELETE')
        <button type="submit" class="boston" onclick="return confirm('Tem certeza que deseja deletar usuario?')" style="background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 10px 22px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 2px 0px;
        cursor: pointer;
        border-radius: 12px;
        ">Excluir</button>
    </form>
    </div>
    <h1>Visualizar Usuario</h1>

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
</body>
</html>


