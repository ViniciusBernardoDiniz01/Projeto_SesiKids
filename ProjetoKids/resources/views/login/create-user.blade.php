<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/createUser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/imagemsesisnai.css') }}">
    <title>Pagina Login</title>
</head>
<body>
    <header>
        <a href="{{ route('user.index') }}" class="h1-titulo">Voltar</a>
        <div class="heade">
            <h1>Bem-vindo à nossa página</h1>
            <b><h3>Crie sua conta!</h3></b>
        </div>
        <p style="color: #934ffa">.</p>
    </header>
    <img src="/img/timbre_sesi_senai.png" alt="" class="logo-sesi">
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
                <label for="fname">Nome:</label>
                <input 
                    placeholder="Digite seu Nome" 
                    type="text" 
                    class="input-email" 
                    id="Email" 
                    name="name" 
                    value="{{ old('name') ?? '' }}">

                <label for="fname">Email:</label>
                <input placeholder="Digite seu E-mail" type="email" class="input-email" id="Email" name="email" value="{{ old('email')}}">
            

                <label for="password">Senha:</label>
                <div class="mostrar">
                    <input placeholder="Digite sua Senha" type="password" class="input-senha" id="password" name="password" required>
                    <span role="button" class="olho" onclick="togglePassword('password', this)">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>

                <label for="password_confirmation">Confirmar Senha:</label>
                <div class="mostrar">
                    <input placeholder="Confirme sua Senha" type="password" class="input-senha" id="password_confirmation" name="password_confirmation" required>
                    <span role="button" class="olho" onclick="togglePassword('password_confirmation', this)">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
                    <label for="image">Imagem:</label>
                    <input type="file" name="image" id="image" class="input-image"><br>
                    
                    <center><button type="submit" class="button">Enviar</button><br></center><br>
                    <center>
                        <a href="{{ route("login") }}">Já tenho login</a> 
                        @can('cadastrados-user')
                            <a href="{{ route('dashboard.index')}}">/Adm</a>
                        @endcan 
                    </center>
                </div>
            </div>
            </form>
        </section>
    </main>

    
        <script>
    function togglePassword(inputId, element) {
        const input = document.getElementById(inputId);
        const icon = element.querySelector("i");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
</body>
</html>