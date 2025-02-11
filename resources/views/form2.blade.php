@extends('layouts.main_layout')

@section('links')
<script src="https://cdn.jsdelivr.net/npm/cleave.js/dist/cleave.min.js"></script>
@endsection

@section('content')

<div class="container" >
    <h1>Adicionar Itens ao RDV nº {{ $numero }}</h1>
    <h2>{{ $nome }}</h2>
    <h3>{{ $via }}</h3>
    <form action="#" method="post">
         @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Descrição</label>
                <input class="form-control" type="text">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Valor R$</label>
                <input class="form-control" type="text" placeholder="0,00" oninput="formatarMoeda(this)">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <button type="button" class="btn" onclick="window.history.back()">Voltar</button>
    </form>
</div>

<script> function formatarMoeda(input) {
    let valor = input.value.replace(/\D/g, '');
    valor = (valor / 100).toFixed(2) + '';
    valor = valor.replace(".", ",");
    valor = valor.replace(/(\d)(?=(\d{3})+\,)/g, "$1.");
    input.value = valor; }
</script>

</body>
</html>
@endsection
