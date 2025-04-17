<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <title>Editar Usuário</title>
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


            <div class="login"><h2>Editar Usuário</h2></div>
            <div class="formulario">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="color: red">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <label for="fname">Nome:</label><br>
            <input type="text" class="input-email" id="Email" name="name" value="{{ old('name', $user->name )}}"><br>

            <label for="fname">E-mail:</label><br>
            <input type="email" class="input-email" id="Email" name="email" value="{{ old('email', $user->email)}}"><br>

            <label for="password">Senha:</label>
                <div class="mostrar">
                    <input type="password" class="input-senha" id="password" name="password">
                    <span role="button" class="olho" onclick="togglePassword('password', this)">👁</span>
                </div>
            
            <label for="password_confirmation">Confirmar Senha:</label>
                <div class="mostrar">
                    <input type="password" class="input-senha" id="password_confirmation" name="password_confirmation">
                    <span role="button" class="olho" onclick="togglePassword('password_confirmation', this)">👁</span>
                </div>

            <button type="submit" class="button">Enviar</button><br>
            </div>
        </form>
    </section>

    <script>
    function togglePassword(inputId, element) {
    const input = document.getElementById(inputId);
    if (input.type === "password") {
        input.type = "text";
        element.innerHTML = "🙈"; // Ícone para ocultar
    } else {
        input.type = "password";
        element.innerHTML = "👁"; // Ícone para mostrar
    }
}
    </script>
</body>
</html>
