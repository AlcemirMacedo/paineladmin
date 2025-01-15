@extends('layouts.main_layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/dash-frame.css') }}">
@endsection

@foreach ($sql as $item)
@endforeach

@section('content')
<div class="dash-fornecedor">

    
    <form action="/gerarpdf/{{ $item->id_fornecedores }}" method="post">
        @csrf
        <table class="table table-striped">
            <tr>
                <th>Nome:</th>
                <td>{{ $item->nome }}</td>
            </tr>
            <tr>
                <th>CNPJ / CPF:</th>
                <td>{{ $item->cpfcnpj }}</td>
            </tr>
            <tr>
                <th>Cidade:</th>
                <td>{{ $item->cidade}}</td>
            </tr>
            <tr>
                <th>Telefone:</th>
                <td>{{ $item->telefone}}</td>
            </tr>
            <tr>
                <th><label for="descricao">Descrição:</label></th>
                <td><input class="form-control" type="text" name="descricao"></td>
            </tr>
            <tr>
                <th><label for="descricao">Valor:</label></th>
                <td>R$ <input name="descricao" type="text"></td>
            </tr>
        </table>
        <button class="btn btn-success btn-lg" type="submit">Emitir Recibo</button>
        <a href="/fornecedor" class="btn btn-light btn-lg" style="margin-left: 10px">Voltar</a>
    </form>

</div>
@endsection



