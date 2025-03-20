<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <title>Pagina Login</title>
</head>
<body>
    
    <header><h1>Bem vindo a nossa pagina de login para Professores</h1></header>
    <main>
        <section>
            <form action="text">
                <div class="login"><h2>login</h2></div>
                <div class="formulario">
                <label for="fname">Email:</label><br>
                <input type="text" class="input-email" id="Email" name="email"><br>
                <label for="lname">Senha:</label><br>
                <input type="text" class="input-senha" id="Senha" name="password"><br>
                <button class="button">Enviar</button><br>
                <center><a href="{{ route('user.create')}}">Não tenho login </a><a href=""> / Esqueci meus dados</a></a></center>
                </div>
            </form>
        </section>
    <footer 
        style="background-color: #fff;
        position: absolute;
        bottom: 0;
        right: 0;
        border-radius: 10px;
        padding: 10px;
        margin: 10px;
        font-size: 0.8rem;
        display: flex;
        flex-direction: column; 
        text-decoration: none;">
        
        @forelse($users as $Sist)
        <br>
        ID: {{ $Sist->id }}<br>
        Nome: {{ $Sist->name }}<br>
        E-mail: {{ $Sist->email }}<br>
        <a href="{{ route('user.show', ['user'=> $Sist->id ])}}" class="boston">Visualizar</a>
        <a href="{{ route('user.edit', ['user'=> $Sist->id ])}}" class="boston">Editar</a><br>
        <hr>
        @empty

        @endforelse
    </footer>
</main>
</body>
</html>