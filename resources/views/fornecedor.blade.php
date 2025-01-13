@extends('layouts.main_layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/dash-frame.css') }}">
@endsection

@section('content')
    <div class="dash-fornecedor">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF / CNPJ</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sql as $item)
                    <tr>
                        <th scope="row">{{ $item->id_fornecedores }}</th>
                        <td class="name_forn">{{ $item->nome }}</td>
                        <td>{{ $item->cpfcnpj }}</td>
                        <td>{{ $item->cidade }}</td>
                        <td>{{ $item->telefone }}</td>
                        <td>{{ $item->email }}</td>
                        <td><a href="/editar/{{ $item->id_fornecedores }}">Editar</a> | <a href="/editar/{{ $item->id_fornecedores }}">Emitir Recibo</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        @php
        $paginator = $sql
    @endphp
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
