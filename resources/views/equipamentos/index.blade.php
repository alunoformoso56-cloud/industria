<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Equipamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="mb-4">Lista de Equipamentos</h1>

    <a href="{{ route('equipamentos.create') }}" class="btn btn-primary mb-3">Novo</a>

    <table class="table table-bordered table-striped">
        <thead class="table-info">
            <tr>
                <th>Nome</th>
                <th>Patrimônio</th>
                <th>Status</th>
                <th>Setor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($equipamentos as $equipamento)
                <tr>
                    <td>{{ $equipamento->nome }}</td>
                    <td>{{ $equipamento->patrimonio }}</td>
                    <td>
                        @if ($equipamento->status === 'ativo')
                            <span class="badge bg-success">Ativo</span>
                        @elseif ($equipamento->status === 'manutencao')
                            <span class="badge bg-warning text-dark">Em manutenção</span>
                        @else
                            <span class="badge bg-secondary">Inativo</span>
                        @endif
                    </td>
                    <td>{{ $equipamento->setor->nome ?? '—' }}</td>
                    <td>
                        <a href="{{ route('equipamentos.edit', $equipamento) }}" class="btn btn-primary btn-sm">Editar</a>

                        <form method="POST" action="{{ route('equipamentos.destroy', $equipamento) }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum equipamento cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>