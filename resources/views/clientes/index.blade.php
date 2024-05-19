@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
<div class="content">
    <div class="row my-4">
        <div class="col-10">
            <h6>Lista de clientes</h6>
        </div>
        <div class="col-2">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('clientes-create') }}">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                </span>
                <span class="ms-2">Novo</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col">

        @if(session('success'))
            <div id="createAlert" class="alert alert-success">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(() => {
                    createAlert.remove();
                }, 1000);
            </script>
        @endif

        @if(session('warning'))
            <div id="editAlert" class="alert alert-warning">
                {{ session('warning') }}
            </div>
            <script>
                setTimeout(() => {
                    editAlert.remove();
                }, 1000);
            </script>
        @endif

        @if(session('danger'))
            <div id="deleteAlert" class="alert alert-dadnger">
                {{ session('danger') }}
            </div>
            <script>
                setTimeout(() => {
                    deleteAlert.remove();
                }, 1000);
            </script>
        @endif

        @if(count($clientes))
            <table class="table table-bordered table-hover table-striped">
                <thead style="font-size: 12px;">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Produto</th>
                    <th>Serviço</th>
                    <th>Observação</th>
                    <th>Valor do serviço</th>
                    <th>Valor de entrada</th>
                    <th>Valor restante</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody style="font-size: 10px;">
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->telefone }}</td>
                        <td>{{ $cliente->endereco }}</td>
                        <td>{{ $cliente->produto }}</td>
                        <td>{{ $cliente->servico }}</td>
                        <td>{{ $cliente->observacao }}</td>
                        <td>R$ {{ ($cliente->valor) }}, 00</td>
                        <td>R$ {{ ($cliente->valor_entrada) }},00</td>
                        <td>R$ {{ ($cliente->valor - $cliente->valor_entrada) }},00</td>
                        <td class="d-flex">
                            <a class="btn btn-outline-warning btn-sm" href="{{ route('clientes-edit', ['id'=>$cliente->id]) }}" title="Clique para editar cliente">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                            </a>
                            <form action="{{ route('clientes-destroy', ['id'=>$cliente->id]) }}" method="POST" onsubmit="return confirm('Deseja realmente exlcluir esse clientes?')">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger btn-sm ms-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </button>
                            </form>
                            <a class="btn btn-outline-success btn-sm ms-2" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $cliente->telefone) }}" target="_blank" title="Enviar mensagem pelo WhatsApp">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path d="M13.601 2.344A7.5 7.5 0 1 0 7.5 15a7.4 7.4 0 0 0 3.701-.977l2.163.575-1.675-1.575c.405-.346.78-.751 1.108-1.203C14.781 10.755 15 9.295 15 7.5c0-1.422-.39-2.78-1.1-3.956-.228-.377-.506-.727-.846-1.1zm-2.683 9.918a6.6 6.6 0 1 1-5.258-10.15c.912.05 1.786.35 2.548.855a6.561 6.561 0 0 1 3.145 5.295c0 1.194-.31 2.34-.872 3.328l-.96-.254-.603.682zm.694-2.358-1.516-1.133a.96.96 0 0 0-.924-.156l-.234.098a.86.86 0 0 1-.474.031.99.99 0 0 1-.413-.242c-.88-.805-1.716-1.741-2.453-2.798-.169-.247-.346-.508-.456-.788-.08-.201-.105-.415-.073-.627a.875.875 0 0 1 .227-.512l.16-.159a.835.835 0 0 0 .144-.944l-.147-.293c-.057-.114-.116-.227-.18-.34a1.027 1.027 0 0 0-.817-.524 1.183 1.183 0 0 0-.573.089c-.42.159-.824.376-1.205.642a5.842 5.842 0 0 0-.56.48c-.08.079-.154.164-.227.25-.136.166-.286.348-.366.548a1.292 1.292 0 0 0 .098 1.275c.081.108.176.208.28.301a7.213 7.213 0 0 0 4.64 2.412c.037.003.073.003.11.002.186-.003.37-.018.551-.048.177-.03.354-.071.527-.125a6.32 6.32 0 0 0 1.408-.524c.082-.044.16-.097.239-.145.105-.06.207-.127.306-.196a1.171 1.171 0 0 0 .37-1.329z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <div class="alert alert-info">
                    Não existe cliente cadastrado nesta tabela.
                </div>
        @endif
        </div>
    </div>
</div>
@endsection