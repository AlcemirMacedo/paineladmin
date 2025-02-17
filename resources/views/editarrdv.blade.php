@extends('layouts.main_layout')

@section('content')

@foreach ($sqlRdv as $item)

@endforeach

<div class="container">
    <h1>Selecione o funcionário</h1>
    <form action="/salvaredicao" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputState">Responsável: {{ $item->nome_funcionario }}</label>
                <select id="inputState" name="responsavel" class="form-control">
                    <option selected>{{ $item->nome_funcionario }}</option>
                        @foreach ($sql as $ite)
                        <option  value="{{ $ite->id_funcionario }}">{{ $ite->nome_funcionario }}</option>
                        @endforeach
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Via: {{ $item->via }}</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="via" id="inlineRadio1" value="Terrestre">
                    <label class="form-check-label" for="inlineRadio1">Terrestre</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="via" id="inlineRadio2" value="Fluvial">
                    <label class="form-check-label" for="inlineRadio2">Fluvial</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="via" id="inlineRadio2" value="Fluvial/Terrestre">
                    <label class="form-check-label" for="inlineRadio2">Terrestre/Fluvial</label>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Data: {{ $item->data_viagem }}</label>
                <input class="form-control" type="date" name="data">
            </div>
            <div style="margin-left: 10px" class="form-group">
                <label>Hora: {{ $item->hora }}</label>
                <input class="form-control" type="time" name="hora">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Justificativa</label>
                <input name="justificativa" class="form-control" value="{{ $item->justificativa }}" type="text">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Equipe</label>
                <input name="equipe" class="form-control" value="{{ $item->equipe }}" type="text">
            </div>
            <div class="form-group col-md-12">
                <label>Operação</label>
                <input name="ope" class="form-control" value="{{ $item->operacao }}" type="text">
            </div>
        </div>

        {{-- inputs hidden para coletar os dados --}}
        <input type="hidden" name="id" value="{{ $item->id }}">
        <input type="hidden" name="numrdv" value="{{ $item->num_rdv }}">
        <input type="hidden" name="created_at" value="{{ $item->created_at }}">
        <input type="hidden" name="idfun" value="{{ $ite->id_funcionario_fk }}">

        {{-- fim dos inputs hidden --}}

        <button type="submit" class="btn btn-success"><i class="bi bi-floppy-fill"> Salvar</i></button>
        <button type="button" class="btn" onclick="window.history.back()">Cancelar</button>
    </form>
</div>
</body>
</html>
@endsection
