<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/jogos.css">
    <title>Escolha um jogo</title>
</head>

<!-- sala do ..... -->

<body>
    <header class="cabecario">
        <h1 class="titulo">Jogos de ....</h1>
        <button id="sair"><a href="{{route("user.index")}}" style="text-decoration: none;">⬅️Sair</a></button>
        <p>imagem logo</p>
    </header>
    <div class="containerJogos">
        <div class="jogo1">
            <div class="foto1">
                <img src="/img/images.jpg" class="roblox-imagem" alt="">
            </div>
            <button class="glow-on-hover">Start</button>
        </div>
        <div class="jogo2">
            <div class="foto2">
                <img src="/img/images.jpg" class="roblox-imagem" alt="">
            </div>
            <button class="glow-on-hover">Start</button>
        </div>
        <div class="jogo3">
            <div class="foto3">
                <img src="/img/images.jpg" class="roblox-imagem" alt="">
            </div>
            <button class="glow-on-hover">Start</button>
        </div>
        <div class="jogo4">
            <div class="foto4">
                <img src="/img/images.jpg" class="roblox-imagem" alt="">
            </div>
            <button class="glow-on-hover">Start</button>
        </div>
    </div>
    <footer class="incerramento">
        <button id="proximo" class="glow-on-hover">Proximo</button>
    </footer>
    <script src="./script.js"></script>
</body>

</html>
