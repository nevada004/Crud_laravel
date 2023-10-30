<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/tabela.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <script src="{{asset('js/formulario.js')}}"></script>
    <script src="{{asset('js/menu.js')}}"></script>
    <title>Usuarios cadastrados</title>
</head>
<body>
<div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
    <div class="menu open">    
        <div class="menu-content">
            <a href="/formulario">Cadastrar usuários</a>
            <a href="/usuarios">Usuários cadastrados</a>
        </div>
    </div>
    <script src="{{asset('js/menu.js')}}"></script>
<table class="menu-open">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>CEP</th>
            <th>Rua</th>
            <th>Número</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Complemento</th>
            <th>Ação</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->cpf }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->phone }}</td>
                <td>{{ $usuario->cep }}</td>
                <td>{{ $usuario->street }}</td>
                <td>{{ $usuario->number }}</td>
                <td>{{ $usuario->neighborhood }}</td>
                <td>{{ $usuario->city }}</td>
                <td>{{ $usuario->state }}</td>
                <td>{{ $usuario->complement }}</td>
                <td>
                    <a href="{{ route('users.edicao', $usuario->id)}}" style="color:black">Editar</a>
                </td>
                <td>
                    <a href="{{ route('usuarios.destroy', $usuario->id) }}" onclick="return confirm('Tem certeza de que deseja excluir este usuário?')" style="color:black">Deletar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>