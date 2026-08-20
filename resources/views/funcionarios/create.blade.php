<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="mb-4">Cadastro de Funcionário</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('funcionarios.store') }}" class="card p-4">
        @csrf

        <div class="mb-3">
            <label class="form-label" for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="matricula">Matrícula</label>
            <input type="text" class="form-control" id="matricula" name="matricula" value="{{ old('matricula') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="cargo">Cargo</label>
            <input type="text" class="form-control" id="cargo" name="cargo" value="{{ old('cargo') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="setor_id">Setor</label>
            <select class="form-select" id="setor_id" name="setor_id" required>
                <option value="">Selecione...</option>
                @foreach ($setores as $setor)
                    <option value="{{ $setor->id }}">{{ $setor->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
</body>
</html>