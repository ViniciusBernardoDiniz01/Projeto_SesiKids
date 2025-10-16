<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/usuariosCadastrados.css') }}">
    <link rel="stylesheet" href="{{ asset('css/createUser.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Feedback</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-block:hidden;
        }
        /* Estilização dos inputs */
        .formulario input[type="text"], 
        .formulario textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 2px solid #a67ff0;
            border-radius: 8px;
            outline: none;
            font-size: 16px;
            transition: 0.3s;
        }

        .formulario input[type="text"]:focus, 
        .formulario textarea:focus {
            border-color: #6c3ddb;
            box-shadow: 0 0 5px #a67ff0;
        }

        .logo-sesi {
            width: 300px;
            height: 50px;
            position: absolute;
            top: 85px;
            right: 0px;
        }

        @media (max-width: 900px) {
            .logo-sesi {
                width: 150px;
                height: 20px;
            }
        }

        .rating {
            display: flex;
            flex-direction: row-reverse; /* inverte a ordem */
            justify-content: center;
            gap: 10px;
            margin: 15px 0;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 3rem;
            color: #ccc;
            cursor: pointer;
            transition: color 0.3s;
        }

        .rating input:checked ~ label,
        .rating label:hover,
        .rating label:hover ~ label {
            color: #ffc107; /* dourado */
        }

        .button {
            background: linear-gradient(90deg, #8e2de2, #4a00e0);
            color: #fff;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        .button:hover {
            opacity: 0.9;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <header>
        <div class="header-left">
            <a href="{{ route('logout') }}" class="link">Sair</a>
        </div>
        <div class="header-center">
            <a href="painel" class="painel">Feedback</a>
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
        <img src="/img/timbre_sesi_senai.png" alt="" class="logo-sesi">
        <section>
            <form method="POST" enctype="multipart/form-data" style="margin-top: 1%;">
                <div class="login"><h2>Digite seu Feedback</h2></div>
                <div class="formulario">
                    
                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf

                        <div class="rating">
                            <input type="radio" id="star1" name="rating" value="1"><label for="star1">★</label>
                            <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
                            <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
                            <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
                            <input type="radio" id="star5" name="rating" value="5"><label for="star5">★</label>
                        </div>
                    </form>


                    <label for="name">Nome:</label>
                    <input 
                        placeholder="Digite o Nome do seu Feedback" 
                        type="text" 
                        id="name" 
                        name="name" 
                        required>

                    <label for="descricao">Descrição:</label>
                    <textarea 
                        placeholder="Digite o motivo desse Feedback" 
                        id="descricao" 
                        name="descricao" 
                        rows="5" 
                        required></textarea>

                    <center><button type="submit" class="button">Enviar</button></center>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
