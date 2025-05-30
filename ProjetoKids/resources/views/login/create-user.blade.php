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
        <div class="heade">
            <h1>Bem-vindo à nossa página</h1>
            <b><h3>Crie sua conta!</h3></b>
        </div>
        <p>logo</p>
    </header>
    <main>
        <section>
            <form action=" {{route("login.storage")}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="login"><h2>Cadastro!</h2></div>
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
            <div class="formulario">
                <label for="fname">Nome:</label><br>
                <input 
                    placeholder="Digite seu Nome" 
                    type="text" 
                    class="input-email" 
                    id="Email" 
                    name="name" 
                    value="{{ old('name') ?? '' }}"><br>

                <label for="fname">Email:</label><br>
                <input placeholder="Digite seu E-mail" type="email" class="input-email" id="Email" name="email" value="{{ old('email')}}"><br>
            

                <label for="password">Senha:</label>
                <div class="mostrar">
                    <input placeholder="Digite sua Senha" type="password" class="input-senha" id="password" name="password" required>
                    <span role="button" class="olho" onclick="togglePassword('password', this)">👀</span>
                </div>

                <label for="password_confirmation">Confirmar Senha:</label>
                <div class="mostrar">
                    <input placeholder="Confirme sua Senha" type="password" class="input-senha" id="password_confirmation" name="password_confirmation" required>
                    <span role="button" class="olho" onclick="togglePassword('password_confirmation', this)">👀</span>
                </div>
                    <label for="image">Imagem:</label>
                    <input type="file" name="image" id="image" class="input-image"><br>
                    
                    <center><button type="submit" class="button">Enviar</button><br></center><br>
                    <center><a href="{{ route("login") }}">Já tenho login</a></center>
                </div>
            </div>
            </form>
        </section>
    </main>

    <script>
        function togglePassword(inputId, element) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                element.innerHTML = "🙈"; // Ícone para ocultar
            } else {
                input.type = "password";
                element.innerHTML = "👀"; // Ícone para mostrar
            }
        }
        </script>
</body>
</html>