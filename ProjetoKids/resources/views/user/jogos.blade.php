<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL:: asset('../../../public/CSS/jogos.css')}}">
    <title>Escolha um jogo</title>
    <style>
        *{
    margin: 0%;
    padding: 0px;
}
body{
    background-color: #cac4f8;
}

#sair{
    order: -1;
}

.cabecario{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 5px;
    background-color: #7a37e6;
}

.containerJogos{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

.foto1,.foto2,.foto3,.foto4{
    background-color: blue;
}

.jogo1, .jogo2, .jogo3, .jogo4{
    margin: 5%;
    background-color: black;
    padding: 10px;
    height: 400px;
    width: 30%;
}
    </style>
</head>

<!-- sala do ..... -->

<body>
    <header class="cabecario">
        <h1 class="titulo">Jogos de ....</h1>
        <button id="sair">⬅️Sair</button>
        <p>imagem logo</p>
    </header>
    <div class="containerJogos">
        <div class="jogo1">
            <div class="foto1">
                Jogo
            </div>
            <h4>Jogo ....</h4>
        </div>
        <div class="jogo2">
            <div class="foto2">
                s
            </div>
            <h4>Jogo ....</h4>
        </div>
        <div class="jogo3">
            <div class="foto3">
                f
            </div>
            <h4>jogo ....</h4>
        </div>
        <div class="jogo4">
            <div class="foto4">
                f
            </div>
            <h4>jogo ....</h4>
        </div>
    </div>

    <script src="./script.js"></script>
</body>

</html>
