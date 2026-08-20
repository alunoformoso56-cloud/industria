<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\Setor;

class EquipamentoController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::all();
        return view('equipamentos.index', compact('equipamentos'));
    }

    public function create()
    {
        $setores = Setor::all();
        return view('equipamentos.create', compact('setores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'       => 'required|string|max:150',
            'patrimonio' => 'required|string|max:50|unique:equipamentos,patrimonio',
            'status'     => 'required|in:ativo,inativo,manutencao',
            'setor_id'   => 'required|exists:setores,id',
        ]);

        Equipamento::create($request->all());

        return redirect()->route('equipamentos.index');
    }

    public function edit(Equipamento $equipamento)
    {
        $setores = Setor::all();
        return view('equipamentos.edit', compact('equipamento', 'setores'));
    }

    public function update(Request $request, Equipamento $equipamento)
    {
        $request->validate([
            'nome'       => 'required|string|max:150',
            'patrimonio' => 'required|string|max:50|unique:equipamentos,patrimonio,' . $equipamento->id,
            'status'     => 'required|in:ativo,inativo,manutencao',
            'setor_id'   => 'required|exists:setores,id',
        ]);

        $equipamento->update($request->all());

        return redirect()->route('equipamentos.index');
    }

    public function destroy(Equipamento $equipamento)
    {
        $equipamento->delete();
        return redirect()->route('equipamentos.index');
    }
}