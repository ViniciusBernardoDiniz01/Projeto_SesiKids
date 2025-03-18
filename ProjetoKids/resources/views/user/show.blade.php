<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('user.login') }}">Lista</a>
    <h1>Visualizar Usuario</h1>

    ID: {{ $user->id }}<br>
    Nome: {{ $user->name }}<br>
    E-mail: {{ $user->email }}<br>
    
    Cadastrado em: {{\Carbon\Carbon::parse($user->created_at)->format('d/m/y H:i:s') }}<br>
    Atualizado em: {{\Carbon\Carbon::parse($user->updated_at)->format('d/m/y H:i:s') }}<br>
</body>
</html>


