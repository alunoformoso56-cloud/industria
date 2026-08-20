<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Setor;

class FuncionarioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nome'      => 'required|string|max:150',
            'matricula' => 'required|string|max:20|unique:funcionarios,matricula',
            'cargo'     => 'required|string|max:100',
            'setor_id'  => 'required|exists:setores,id',
        ]);

        Funcionario::create($request->all());

        return redirect()->route('funcionarios.index');
    }
    public function create()
{
    $setores = Setor::all();
    return view('funcionarios.create', compact('setores'));
}
public function index()
{
    $funcionarios = Funcionario::all();
    return view('funcionarios.index', compact('funcionarios'));
}
public function edit(Funcionario $funcionario)
{
    $setores = Setor::all();
    return view('funcionarios.edit', compact('funcionario', 'setores'));
}

public function update(Request $request, Funcionario $funcionario)
{
    $request->validate([
        'nome'      => 'required|string|max:150',
        'matricula' => 'required|string|max:20|unique:funcionarios,matricula,' . $funcionario->id,
        'cargo'     => 'required|string|max:100',
        'setor_id'  => 'required|exists:setores,id',
    ]);

    $funcionario->update($request->all());

    return redirect()->route('funcionarios.index');
}
public function destroy(Funcionario $funcionario)
{
    $funcionario->delete();
    return redirect()->route('funcionarios.index');
}
}