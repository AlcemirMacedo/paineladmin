@extends('layouts.main_layout')

@section('links')

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
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
            </tr>
            @foreach ($sql as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome_funcionario }}</td>
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

