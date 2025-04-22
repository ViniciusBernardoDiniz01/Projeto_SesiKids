<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <title>Página de Login</title>
</head>
<body>
    
    <header>
        <a href="{{ route('user.create') }}" class="link-2">Voltar</a>
        <h1 class="h1-titulo">Bem-vindo à nossa página de login para Professores</h1>
    </header>
    <main>
        <section>
            <form action="text">
                <div class="login"><h2>Login</h2></div>
                <div class="formulario">
                    <label for="fname">Email:</label><br>
                    <input type="text" class="input-email" id="Email" name="email"><br>
                    
                    <label for="lname">Senha:</label><br>
                    <div class="mostrar">
                        <input type="password" class="input-senha" id="Senha" name="password">
                        <span role="button" class="olho" onclick="togglePassword('Senha', this)">👀</span>
                    </div>
                    
                    <button class="button">Enviar</button><br>
                    <center>
                        <a href="{{ route('user.create')}}">Não tenho login</a>
                        <a href=""> / Esqueci meus dados</a>
                    </center>
                </div>
                <center><a href={{route('user.usuarioCadastrado')}} class="link">Admin</a></center>
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