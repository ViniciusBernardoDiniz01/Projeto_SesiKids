<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção de Jogos</title>
    <link rel="stylesheet" href="{{ asset('css/menuJogos.css') }}">
</head>

<body>
    <header>
        <a href="{{route("user.index")}}"><button class="botao">Voltar</button></a>
        <h1>Selecione seu jogo</h1>
    </header>

    <div class="jogos">
        <div class="card">
            <img src="./img/portugues.jpg" alt="Português">
            <div class="botao2"><a href="#">Entrar</a></div>
        </div>

        <div class="card">
            <img src="./img/matematica.jpg" alt="Matemática">
            <div class="botao2"><a href="#">Entrar</a></div>
        </div>

        <div class="card">
            <img src="./img/Biologia.jpg" alt="Biologia">
            <div class="botao2"><a href="{{route("user.jogosBio")}}">Entrar</a></div>
        </div>

        <div class="card">
            <img src="./img/historia.jpg" alt="História">
            <div class="botao2"><a href="#">Entrar</a></div>
        </div>
    </div>
</body>

</html>
