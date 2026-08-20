<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Equipamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="mb-4">Editar Equipamento</h1>

    <form method="POST" action="{{ route('equipamentos.update', $equipamento) }}" class="card p-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label" for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $equipamento->nome }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="patrimonio">Patrimônio</label>
            <input type="text" class="form-control" id="patrimonio" name="patrimonio" value="{{ $equipamento->patrimonio }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="status">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="ativo"      {{ $equipamento->status === 'ativo' ? 'selected' : '' }}>Ativo</option>
                <option value="inativo"    {{ $equipamento->status === 'inativo' ? 'selected' : '' }}>Inativo</option>
                <option value="manutencao" {{ $equipamento->status === 'manutencao' ? 'selected' : '' }}>Em manutenção</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label" for="setor_id">Setor</label>
            <select class="form-select" id="setor_id" name="setor_id" required>
                @foreach ($setores as $setor)
                    <option value="{{ $setor->id }}" {{ $equipamento->setor_id == $setor->id ? 'selected' : '' }}>
                        {{ $setor->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar alterações</button>
        <a href="{{ route('equipamentos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>