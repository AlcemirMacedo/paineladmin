@extends('layouts.main_layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/dash-frame.css') }}">
@endsection

@foreach ($sql as $item)
@endforeach

@section('content')
<div class="dash-fornecedor">


    <form action="/gerarpdf" method="post">
        @csrf
        <table class="table table-striped col-md-5">
            <tr>
                <th class="col-md-1"><label for="nome">Nome:</label></th>
                <td class="col-md-4">
                    <input class="form-control" type="text" name="nome" readonly value="{{ $item->nome }}" placeholder="{{ $item->nome }}">
                </td>
            </tr>
            <tr>
                <th>CNPJ / CPF:</th>
                <td><input class="form-control" type="text" name="cpfcnpj" readonly value="{{ $item->cpfcnpj }}" placeholder="{{ $item->cpfcnpj }}"></td>
            </tr>
            <tr>
                <th>Cidade:</th>
                <td><input class="form-control" type="text" readonly value="{{ $item->cidade }}" name="cidade" placeholder="{{ $item->cidade }}"></td>
            </tr>
            <tr>
                <th>Telefone:</th>
                <td><input class="form-control" type="text" name="telefone" readonly placeholder="{{ $item->telefone }}"></td>
            </tr>
            <tr>
                <th><label for="descricao">Descrição:</label></th>
                <td><input class="form-control" type="text" name="descricao" placeholder="Editar Descrição" required></td>
            </tr>
            <tr>
                <th><label for="valor">Valor R$:</label></th>
                <td><input id="valor" oninput="formatarMoeda(this)" class="form-control" name="valor" type="text"></td>
            </tr>
        </table>
        <button class="btn btn-success btn-lg" type="submit">Emitir Recibo</button>
        <a href="/fornecedor" class="btn btn-light btn-lg" style="margin-left: 10px" >Voltar</a>
    </form>

    <script> function formatarMoeda(input) {
        let valor = input.value.replace(/\D/g, '');
        valor = (valor / 100).toFixed(2) + '';
        valor = valor.replace(".", ",");
        valor = valor.replace(/(\d)(?=(\d{3})+\,)/g, "$1.");
        input.value = valor; }
    </script>
</div>
@endsection



