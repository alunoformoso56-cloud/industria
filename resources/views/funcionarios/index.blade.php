<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Funcionários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="mb-4">Lista de Funcionários</h1>

    <a href="{{ route('funcionarios.create') }}" class="btn btn-primary mb-3">Novo</a>

    <table class="table table-bordered table-striped">
        <thead class="table-info">
            <tr>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>Cargo</th>
                <th>Setor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->matricula }}</td>
                    <td>{{ $funcionario->cargo }}</td>
                    <td>{{ $funcionario->setor->nome ?? '—' }}</td>
                   <td>
    <a href="{{ route('funcionarios.edit', $funcionario) }}" class="btn btn-primary btn-sm">Editar</a>
</td>
<td>
    <a href="{{ route('funcionarios.edit', $funcionario) }}" class="btn btn-primary btn-sm">Editar</a>

    <form method="POST" action="{{ route('funcionarios.destroy', $funcionario) }}" style="display:inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
    </form>
</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum funcionário cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>