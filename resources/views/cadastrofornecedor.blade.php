@extends('layouts.main_layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/dash-frame.css') }}">
    <style>
        body{
            padding-top: 50px;
        }
        input{
            text-transform: none;
        }
    </style>
@endsection

@section('content')

<div class="container">
    <h1 class="text-center">Cadastro de Fornecedores</h1>
    <hr>
    <form action="/cadastrarfornecedor" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Nome</label>
                <input class="form-control" type="text" name="nome">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Razão Social</label>
                <input class="form-control" type="text" name="razaosocial" >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>CPF ou CNPJ</label>
                <input class="form-control" type="text" name="cpfcnpj" >
            </div>
            <div class="form-group col-md-8">
                <label>Endereço</label>
                <input class="form-control" type="text" name="endereco" >
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Bairro</label>
                <input class="form-control" type="text" name="bairro" >
            </div>
            <div class="form-group col-md-4">
                <label>Cidade</label>
                <input class="form-control" type="text" name="cidade" >
            </div>
            <div class="form-group col-md-1">
                <label>UF</label>
                <input class="form-control" type="text" name="uf" maxlength="2" >
            </div>
            <div class="form-group col-md-3">
                <label>CEP</label>
                <input class="form-control" type="text" name="cep" >
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Email</label>
                <input class="form-control" type="text" name="email" >
            </div>
            <div class="form-group col-md-4">
                <label>Tipo Pessoa</label>
                <select name="tipo" class="form-control">
                    <option value="cpf">CPF</option>
                    <option value="cnpj">CNPJ</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label>Contato</label>
                <input class="form-control" type="text" name="telefone" >
            </div>
        </div>

        <div class="form-row">
            <button type="submit" class="btn btn-success col-md-2">Cadastrar</button>
            <a href="/fornecedor" class="btn btn-light col-md-2" style="margin-left: 10px">Cancelar</a>
        </div>
    </form>
</div>

@endsection
