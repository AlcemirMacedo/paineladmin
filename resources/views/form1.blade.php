@extends('layouts.main_layout')

@section('content')

<div class="container">
    <h1>Selecione o funcionário</h1>
    <form action="salvarresponsavel" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputState">Responsável</label>
                <select id="inputState" name="responsavel" class="form-control">
                    <option selected>---</option>
                    @foreach ($sql as $item)
                        <option  value="{{ $item->id_funcionario }}">{{ $item->nome_funcionario }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Via:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="via" id="inlineRadio1" value="Terrestre">
                    <label class="form-check-label" for="inlineRadio1">Terrestre</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="via" id="inlineRadio2" value="Fluvial">
                    <label class="form-check-label" for="inlineRadio2">Fluvial</label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Data:</label>
                <input class="form-control" type="date" name="data">
            </div>
        </div>
        <!-- Aqui estava faltando fechar as divs -->
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Justificativa</label>
                <input name="justificativa" class="form-control" type="text">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Equipe</label>
                <input name="equipe" class="form-control" type="text">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Próximo <i class="bi bi-chevron-double-right"></i></button>
        <button type="button" class="btn" onclick="window.history.back()">Voltar</button>
    </form>
</div>
</body>
</html>
@endsection
