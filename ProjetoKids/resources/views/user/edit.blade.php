<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Editar Usuário</title>
</head>
<body>
    <a href="{{ route('user.show', ['user'=> $user->id ])}}">
    Voltar
    </a>
    <a href="{{ route('user.show', ['user'=> $user->id ])}}" class="boston">Visualizar</a><br>
    <section>
        <form action=" {{route('user.update', ['user' => $user->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="login"><h2>Editar Usuário</h2></div>
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

            <label for="fname">Nome:</label><br>
            <input type="text" class="input-email" id="Email" name="name" value="{{ old('name', $user->name )}}"><br>

            <label for="fname">E-mail:</label><br>
            <input type="email" class="input-email" id="Email" name="email" value="{{ old('email', $user->email)}}"><br>

            <label for="password">Senha:</label>
                <div class="mostrar">
                    <input type="password" class="input-senha" id="password" name="password">
                    <span role="button" class="olho" onclick="togglePassword('password', this)">👀</span>
                </div>
            
            <label for="password_confirmation">Confirmar Senha:</label>
                <div class="mostrar">
                    <input type="password" class="input-senha" id="password_confirmation" name="password_confirmation">
                    <span role="button" class="olho" onclick="togglePassword('password_confirmation', this)">👀</span>
                </div>
            
            {{-- <label for="role">Função:</label><br>
            <select name="role" id="role" class="input-role">
                <option value="user" {{ $user->role === 'professor' ? 'selected' : '' }}>Professor</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrador</option>
            </select><br><br> --}}

            <div class="função_div">
                <label class="perfil" for="Perfil">Perfil:</label>
                <select name="roles" class="form-class" id="roles">
                    <option value="" disabled {{ old('roles', $userRoles ?? 'professor') == '' ? 'selected' : '' }}>Selecione</option>
                    @forelse($roles as $role)
                        @if($role != 'admin')
                            <option value="{{ $role }}" {{ old('roles', $userRoles ?? 'professor') == $role ? 'selected' : '' }}>
                                {{ $role }}
                            </option>
                        @else
                            @if(Auth::user()->hasRole('admin'))
                                <option value="{{ $role }}" {{ old('roles', $userRoles ?? 'professor') == $role ? 'selected' : '' }}>
                                    {{ $role }}
                                </option>
                            @endif
                        @endif
                    @empty
                        <option value="" disabled>Nenhum papel encontrado</option>
                    @endforelse
                    </select><br><br>
                </div>

            <label for="image">Imagem:</label>
            <input type="file" name="image" id="image" class="input-image"><br>

            <button type="submit" id="envia" class="button">Enviar</button><br>




            <!-- filepath: c:\Users\3Dev\Documents\GitHub\Projeto_SesiKids\ProjetoKids\resources\views\user\edit.blade.php -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const submitButton = document.querySelector('#envia');

        if (submitButton) {
            submitButton.addEventListener('click', function(event) {
                event.preventDefault(); // Impede o envio padrão do formulário

                Swal.fire({
                    title: "Deseja salvar as alterações?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Salvar",
                    denyButtonText: "Não salvar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire("Salvo!", "As alterações foram salvas com sucesso.", "success").then(() => {
                            this.closest('form').submit(); // Envia o formulário após a confirmação
                        });
                    } else if (result.isDenied) {
                        Swal.fire("Alterações não salvas", "Nenhuma alteração foi feita.", "info");
                    }
                });
            });
        }
    });
</script>
            </div>
        </form>
    </section>

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
