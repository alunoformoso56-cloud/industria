<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="mb-4">Editar Funcionário</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('funcionarios.update', $funcionario) }}" class="card p-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label" for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $funcionario->nome }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="matricula">Matrícula</label>
            <input type="text" class="form-control" id="matricula" name="matricula" value="{{ $funcionario->matricula }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="cargo">Cargo</label>
            <input type="text" class="form-control" id="cargo" name="cargo" value="{{ $funcionario->cargo }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="setor_id">Setor</label>
            <select class="form-select" id="setor_id" name="setor_id" required>
                @foreach ($setores as $setor)
                    <option value="{{ $setor->id }}"
                        {{ $funcionario->setor_id == $setor->id ? 'selected' : '' }}>
                        {{ $setor->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar alterações</button>
        <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>