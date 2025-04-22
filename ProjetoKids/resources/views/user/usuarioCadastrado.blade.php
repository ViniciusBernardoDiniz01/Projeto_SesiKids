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
        <a href="{{route('user.login')}}" class="link">Voltar</a>
        <h1 class="h1-titulo">Bem-vindo à página Admin</h1>
    </header>
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
        <div class="botaos">
        <a href="{{ route('user.show', ['user'=> $Sist->id ])}}" id="boston-1" class="boston">Visualizar</a>
        <a href="{{ route('user.edit', ['user'=> $Sist->id ])}}" id="boston-2" class="boston">Editar</a>
        <form action="{{ route('user.destroy', ['user'=> $Sist->id ])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="boston" id="exclui" onclick="">Excluir</button>
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
        const deleteButton = document.querySelector('#exclui');

        if (deleteButton) {
            deleteButton.addEventListener('click', function(event) {
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
        }
    });
</script>
</body>
</html>
