<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index() {
        $clientes = Cliente::orderBy('id', 'desc')->get();
        return view('clientes.index', ['clientes'=>$clientes]);
    }

    public function create() {
        $clientes = Cliente::all();
        return view('clientes.create', ['clientes'=>$clientes]);
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
            'servico' => 'required',
            'observacao' => 'required',
            'valor' => 'required',
            'valor_entrada' => 'required'
        ]);

        Cliente::create($request->all());

        session()->flash('success', 'Cliente cadastrado com sucesso!');

        return redirect()->route('clientes-index');
    }

    public function edit($id) {
        $clientes = Cliente::where('id', $id)->first();
        return view('clientes.edit', ['clientes'=>$clientes]);
    }

    public function update(Request $request, $id) {
        $data = [
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'servico' => $request->servico,
            'observacao' => $request->observacao,
            'valor' => $request->valor,
            'valor_entrada' => $request->valor_entrada
        ];
        $clientes = Cliente::where('id', $id)->update($data);

        session()->flash('warning', 'Cliente editado com sucesso!');

        return redirect()->route('clientes-index');
    }

    public function destroy($id) {
        $clientes = Cliente::where('id', $id)->delete();

        session()->flash('danger', 'Cliente excluido com sucesso!');

        return redirect()->route('clientes-index');
    }
}
