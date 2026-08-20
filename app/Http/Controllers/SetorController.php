<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setor;

class SetorController extends Controller
{
    public function index()
    {
        $setores = Setor::all();
        return view('setores.index', compact('setores'));
    }

    public function create()
    {
        return view('setores.criar');
    }

    public function store(Request $request)
    {
        Setor::create($request->only('nome'));
        return redirect()->route('setores.index');
    }

    public function show(string $id)
    {
        $setor = Setor::findOrFail($id);
        return view('setores.show', compact('setor'));
    }

    public function edit(string $id)
    {
        $setor = Setor::findOrFail($id);
        return view('setores.edit', compact('setor'));
    }

    public function update(Request $request, string $id)
    {
        $setor = Setor::findOrFail($id);
        $setor->update($request->only('nome'));
        return redirect()->route('setores.index');
    }

    public function destroy(string $id)
    {
        Setor::findOrFail($id)->delete();
        return redirect()->route('setores.index');
    }

    public function ativarDesativar(string $id)
    {
         $setor = Setor::find($id);
         $setor->ativo = !$setor->ativo;
         $setor->save();
         return redirect()->route('setores.index');
    }
}