<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/usuariosCadastrados.css') }}">
    <link rel="stylesheet" href="{{ asset('css/createUser.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <div class="header-left">
            <a href="{{ route('logout') }}" class="link">Sair</a>
        </div>
        <div class="header-center">
            <a href="painel" class="painel">Criar Jogos</a>
                @can('index-role')
                    <a href="{{ route('role.index') }}" class="painel">Perfis</a>
                @endcan
                @can('cadastrados-user')
                    <a href="{{ route('user.usuarioCadastrado') }}" class="painel">Usuários</a>
                @endcan
                @can('create-user-login')
                    <a href="{{ route('login.create-user') }}" class="painel">Cadastrar</a>
                @endcan
        </div>
        <div class="header-right" style="display: flex; flex-direction: column; align-items: center;">
            <div class="img">
                <img src="{{ Auth::user()->image ? asset('img/' . Auth::user()->image) : asset('img/icone_sem_foto.jpg') }}" alt="Foto de perfil" style="width: 50px; height: 50px; border-radius: 100%;">
            </div>
        </div>
    </header>

    <main>
        <section>
            <form method="POST" enctype="multipart/form-data">

                <div class="login"><h2>Jogos</h2></div>
                <div class="formulario">

            <div class="formulario">
                <label for="fname">Nome:</label><br>
                <input 
                    placeholder="Digite o Nome do jogo" 
                    type="text" 
                    class="input-email" 
                    id="Email" 
                    name="name" 
                    value=""><br>

                <label for="fname">Link:</label><br>
                <input placeholder="Digite o link do jogo" type="email" class="input-email" id="Email" name="email" value="" required><br>
            

                <label for="password">Descrição:</label>
                <div class="mostrar">
                    <input placeholder="De uma breve descrição do jogo" type="text" class="input-senha" id="descricao" name="descricao">
                    <span role="button"></span>
                </div>

                    <label for="image">Imagem:</label>
                    <input type="file" name="image" id="image" class="input-image"><br>
                    
                    <center><button type="submit" class="button-jogo">Enviar</button></center><br>
                </div>
            </div>
            </form>
        </section>
    </main>

</body>
</html>
