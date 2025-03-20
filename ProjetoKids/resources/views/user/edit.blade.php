<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Usuario</title>
</head>
<body>
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
    <a href="{{ route('user.show', ['user'=> $user->id ])}}" class="boston" style="background-color: #4CAF50; /* Green */
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
        ">Visualizar</a><br>
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
