<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/createUser.css">
    <title>Pagina Login</title>
</head>
<body>
    <header>
        <a href="{{ route('user.index') }}" class="h1-titulo">Voltar</a>
        <h1>Bem vindo a nossa pagina</h1>
        <b><h3>Crie sua conta!</h3></b>
    </header>
    <main>
        <section>
            <form action=" {{route("user.store")}}" method="POST">
                @csrf

                <div class="login"><h2>Cadastro!</h2></div>
                <div class="formulario">

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <p style="color: #f00">
                        {{ $error }}
                    </p>
                @endforeach
                @endif

                <label for="fname">Nome</label><br>
                <input type="text" class="input-email" id="Email" name="name" value="{{ old('name')}} "><br>

                <label for="fname">Email:</label><br>
                <input type="email" class="input-email" id="Email" name="email" value="{{ old('email')}}"><br>

                <label for="lname">Senha:</label><br>
                <input type="password" class="input-senha" id="Senha" name="password"><br>

                <button type="submit" class="button">Enviar</button><br>

                <center><a href="{{ route("user.login") }}">Já tenho login</a></center>
                </div>
            </form>
        </section>
    </main>
</body>
</html>