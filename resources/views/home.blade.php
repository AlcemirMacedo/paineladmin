@extends('layouts.main_layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/home-dash.css') }}">
@endsection

<style>
    body{
        display: flex;
        justify-content: center;
        align-items: flex-start;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .cards-home{
        transition: all 0.3s;
        cursor:
    }
    .cards-home:hover{
        background-color: rgb(240, 240, 240);
    }
</style>

@section('content')
    @foreach ($ultimoRegistro as $ur)

    @endforeach
        <div class="content" style="display:flex; justify-content: center;">
            <div class="row col-md-12" style="margin-top: 20px">
                <div class=" col-md-4" style="margin-top: 20px;">
                    <div class="cards-home card" style="border-top:3px solid yellow ">
                        <div class="card-body">
                            <h5 class="card-title">Fornecedores</h5>
                            <hr>
                            <p class="card-text">Último Registro  {{ $ur->data_inclusao }}</p>
                            <a href="/fornecedor" class="btn btn-primary">Ver todos | <span class="badge badge-light">{{ $count_fornecedores }}</span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" style="margin-top: 20px">
                    <div class="cards-home card" style="border-top:3px solid orange ">
                        <div class="card-body" >
                            <h5 class="card-title">Recibos</h5>
                            <hr>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum laboriosam.</p>
                            <a href="/gridrecibo" class="btn btn-primary">Ver todos | <span class="badge badge-light">4</span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" style="margin-top: 20px">
                    <div class="cards-home card"  style="border-top:3px solid red ">
                        <div class="card-body">
                            <h5 class="card-title">Funcionários</h5>
                            <hr>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum laboriosam.</p>
                            <a href="#" class="btn btn-primary">Ver todos | <span class="badge badge-light"> 4</span></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" style="margin-top: 20px">
                    <div class="cards-home card"  style="border-top:3px solid green">
                        <div class="card-body">
                            <h5 class="card-title">Usuários</h5>
                            <hr>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum laboriosam.</p>
                            <a href="/usuarios" class="btn btn-primary">Ver todos | <span class="badge badge-light"> 4</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
