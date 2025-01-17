@extends('layouts.main_layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/home-dash.css') }}">
@endsection
@section('content')

    <div class="menu-home">
        <a href="/fornecedor">
            <div class="link_recibo">Fornecedores</div>
        </a>
        <a href="/gridrecibo">
            <div class="link_recibo" style="background-color: var(--color-blue)">Recibos</div>
        </a>
    </div>

@endsection
