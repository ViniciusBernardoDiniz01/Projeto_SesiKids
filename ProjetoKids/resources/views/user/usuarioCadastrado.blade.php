<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/usuariosCadastrados.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <div class="header-left">
            <a href="{{ route('logout') }}" class="link">Sair</a>
        </div>
        <div class="header-center">
            <h1 class="h1-titulo">Bem Vindo a paina admin</h1>
        </div>
        <div class="header-right" style="display: flex; flex-direction: column; align-items: center;">
            <div class="img">
                <img src="{{ Auth::user()->image ? asset('img/' . Auth::user()->image) : asset('img/icone_sem_foto.jpg') }}" alt="Foto de perfil" style="width: 50px; height: 50px; border-radius: 100%;">
            </div>
        </div>
    </header>


    <div class="pesquisa">
                <span class="botoes">
                    <div class="listaDeUsers">
                    <span><h1>Pesquisar</h1></span>
                    </div>
                <div class="links">
                    <a href="{{route('login.create-user')}}" class="Cadastrar">Cadastrar</a>
                    <a href="{{route('user.generate-pdf')}}" class="CriaPdf">Criar Pdf</a>
                    <a href="{{route('user.comentario-pdf')}}" class="CriaPdf">Pdf Comentarios</a>
                </div>
                </span><hr>
        

        <div class="inputs">
            <form action="{{route('user.usuarioCadastrado')}}">

            <div class="campos">
                <div class="nome">
                    <label for="name" class="nome-title">Nome:</label>
                    <input type="text" name="name" id="name" class="nome" value="{{ request('name') }}" placeholder="Digite o nome">
                </div><br>

                <div class="email">
                    <label for="email" class="email-title">Email:</label>
                    <input type="text" name="email" id="email" class="email" value="{{ request('email') }}" placeholder="Digite o email">
                </div>
                <div class="pesquisar-button">
                    <button type="submit" class="btn-pesquisa">Pesquisar</button>
                    <a href="{{url('generate-pdf-user?' . request()->getQueryString())}}" class="btn-pesquisa">Pdf Pesquisa</a>
                    <a href="{{url('generate-pdf-comentario?' . request()->getQueryString())}}" class="btn-pesquisa">Pdf Users</a>
                    <a href="{{route('user.usuarioCadastrado')}}" class="btn-limpar">Limpar</a>
                </div>
            </div>
        </div>
    </div>

    <div class="body">
    <footer>
        @if (session("sucess"))
        <p style="color: #0f0">
            {{ session("sucess") }}
        </p>
        @endif
        @forelse($users as $Sist)
        <div class="fotterall">
        <div class="text">
        <span>ID: {{ $Sist->id }}<br></span>
        <span>Nome: {{ $Sist->name }}<br></span>
        <span>E-mail: {{ $Sist->email }}<br></span>
        </div>

        <div class="img">
            @if (isset($Sist->image))
                <img src="{{ asset('IMG/' . $Sist->image) }}" alt="Foto de perfil" class="img-thumbnail" style="width: 50px; height: 50px; border-radius: 100%;">
            @else
                <img src="{{ asset('IMG/icone_sem_foto.jpg') }}" alt="" class="img-thumbnail" style="width: 50px; height: 50px; border-radius: 100%;">
            @endif
        </div>

        <div class="botaos">
        <a href="{{ route('user.show', ['user'=> $Sist->id ])}}" id="boston-1" class="boston">Visualizar</a>
        <a href="{{ route('user.edit', ['user'=> $Sist->id ])}}" id="boston-2" class="boston">Editar</a>
        <form action="{{ route('user.destroy', ['user'=> $Sist->id ])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="boston exclui" onclick="">Excluir</button>
        </form>
        </div>
        </div>
        <hr>
        @empty
        @endforelse
    </footer>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.exclui'); // Seleciona todos os botões com a classe "exclui"

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Impede o envio padrão do formulário

                Swal.fire({
                    title: "Cuidado!",
                    text: "Deseja realmente excluir este usuário? Esta ação não pode ser desfeita!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Sim, excluir!",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Excluído!",
                            text: "O usuário foi deletado com sucesso.",
                            icon: "success",
                            confirmButtonColor: "#3085d6",
                        }).then(() => {
                            this.closest('form').submit(); // Envia o formulário após a confirmação
                        });
                    }
                });
            });
        });
    });
</script>
</body>
</html>
