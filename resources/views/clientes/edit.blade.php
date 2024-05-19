@extends('layouts.app')

@section('title', 'Atualização de Clientes')

@section('content')
<div class="content">
    <div class="row my-4">
        <div class="col-10">
            <h6>Atualização de clientes</h6>
        </div>
        <div class="col-2">
            <a class="btn btn-outline-secondary btn-sm" href="{{ route('clientes-index') }}">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5"/>
                    </svg>
                </span>
                <span class="ms-2">Voltar</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="{{ route('clientes-update', ['id'=>$clientes->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group my-2">
                    <label class="mb-2" for="">Nome do cliente</label>
                    <input type="text" class="form-control" value="{{ $clientes->nome }}" name="nome">
                </div>
                
                <div class="form-group my-2">
                    <label class="mb-2" for="">Telefone do cliente</label>
                    <input type="text" class="form-control" value="{{ $clientes->telefone }}" name="telefone">
                </div>
                
                <div class="form-group my-2">
                    <label class="mb-2" for="">Endereço do cliente</label>
                    <input type="text" class="form-control" value="{{ $clientes->endereco }}" name="endereco">
                </div>

                <div class="form-group my-2">
                    <label class="mb-2" for="">Serviço</label>
                    <textarea class="form-control" name="servico" id="servico">{{ $clientes->servico }}</textarea>
                </div>

                <div class="form-group my-2">
                    <label class="mb-2" for="">Observação</label>
                    <textarea class="form-control" name="observacao" id="observacao">{{ $clientes->observacao }}</textarea>
                </div>

                <div class="form-group my-2">
                    <label class="mb-2" for="">Valor do serviço</label>
                    <input type="text" class="form-control" value="{{ $clientes->valor }}" name="valor">
                </div>

                <div class="form-group my-2">
                    <label class="mb-2" for="">Valor entrada</label>
                    <input type="text" class="form-control" value="{{ $clientes->valor_entrada }}" name="valor_entrada">
                </div>
                
                <div class="form-group my-4">
                    <input type="submit" class="btn btn-outline-warning btn-sm" value="Editar">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection