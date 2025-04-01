<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
    <title>Editar Usuario</title>
</head>
<body>
    <a href="{{ route('user.show', ['user'=> $user->id ])}}">
    Voltar
    </a>
    <a href="{{ route('user.show', ['user'=> $user->id ])}}" class="boston">Visualizar</a><br>
    <section>
        <form action=" {{route('user.update', ['user' => $user->id])}}" method="POST">
            @csrf
            @method('PUT')


            <div class="login"><h2>Editar Usuario</h2></div>
            <div class="formulario">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                <p style="color: #f00">
                    {{ $error }}
                </p>
            @endforeach
            @endif

            <label for="fname">Nome</label><br>
            <input type="text" class="input-email" id="Email" name="name" value="{{ old('name', $user->name )}}"><br>

            <label for="fname">Email:</label><br>
            <input type="email" class="input-email" id="Email" name="email" value="{{ old('email', $user->email)}}"><br>

            <label for="lname">Senha:</label><br>
            <input type="password" class="input-senha" id="Senha" name="password"><br>

            <button type="submit" class="button">Enviar</button><br>
            </div>
        </form>
    </section>
</body>
</html>
