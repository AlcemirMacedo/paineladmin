@extends('layouts.main_layout')

@section('links')
<link rel="stylesheet" href="{{ asset('css/dash-frame.css') }}">
<style>
    .novo-rdv{
        margin: 20px 0 20px 0;
    }
</style>

@endsection

@section('content')
    @php
        $paginator = $sql
    @endphp

    <div class="container-fluid">
        <h1>RDV's</h1>
        <a href="/novordv" class="btn btn-success novo-rdv">Novo RDV</a>
        <table class="table table-dark">
            <tr>
                <th scope="col">RDV nº</th>
                <th scope="col">Responsável</th>
                <th scope="col">Justificativa</th>
                <th scope="col">Equipe</th>
                <th scope="col">Via</th>
                <th scope="col">Data e Hora da viagem</th>
                <th scope="col">Ações</th>

            </tr>
            @foreach ($sql as $item)
            @php
                $data = new DateTime($item->data_viagem);
                $databr = $data->format('d/m/Y');
            @endphp
                <tr>
                    {{-- <td>{{ $item->id }}</td> --}}
                    <td>{{ $item->num_rdv }}</td>
                    <td>{{ $item->nome_funcionario }}</td>
                    <td>{{ $item->justificativa }}</td>
                    <td>{{ $item->equipe }}</td>
                    <td>{{ $item->via }}</td>
                    <td>{{ $databr }} às {{ $item->hora}}</td>
                    <td>
                        <a href="/editarrdv/{{ $item->id }}" class="btn btn-warning text-white" style="color: rgb(22, 141, 225)" title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <a class="btn btn-danger text-white" title="Excluir" href="/excluirrdv/{{ $item->id }}" onclick="confirmarAcao({{ $item->id }})">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        @if ($paginator->hasPages())
        <ul class="pagination"> {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true"><span>&laquo; Anterior</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Anterior</a></li>
            @endif {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Próximo &raquo;</a></li>
            @else
                <li class="disabled" aria-disabled="true"><span>Próximo &raquo;</span></li>
            @endif
        </ul>
    @endif
    </div>
@endsection

