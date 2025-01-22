@extends('layouts.main_layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/dash-frame.css') }}">
@endsection

@section('content')

<div class="content col-md-12">
    <h1 class="text-center" style="margin-top: 20px">Usuários</h1>
    <hr>
    <a href="/cadastro" class="btn btn-success" style="margin-bottom: 10px">Cadastrar Usuário</a>
    <table class="table table-striped table-light col-md-12">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Login</th>
                <th scope="col">Data</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sql as $item)
                <form action="#" method="POST">
                    @csrf
                    <tr>
                        <th scope="row">
                            {{ $item->id_usuario }}<input type="hidden" placeholder="{{ $item->id_usuario }}" name="id" value="{{ $item->id_usuario }}" readonly>
                        </th>
                        <td>
                            {{ $item->nome }}
                            <input type="hidden" placeholder="{{ $item->nome }}" value="{{ $item->nome }}" name="numero" readonly>
                        </td>
                        <td>
                            {{ $item->login }}
                            <input type="hidden" placeholder="{{ $item->login }}"  value="{{ $item->login }}" name="cpfcnpj" readonly>
                        </td>
                        <td class="name_forn">{{ $item->email }}<input type="hidden" placeholder="{{ $item->email }}" value="{{ $item->email }}" name="nome" readonly></td>
                        <td>
                            <a href="/formrusuario/{{ $item->id_usuario }}" class="edit-bot" style="color: rgb(22, 141, 225)" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a> |
                            <a class="excluir-bot" title="Excluir" href="/excluirsuario/{{ $item->id_usuario }}">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                </form>
            @endforeach

        </tbody>
        <tr id="footer">
            <td colspan="5" align="right">
                <span style="font-weight: bold; color:var(--laranja)">{{ $contador }}</span>  Registros
            </td>
        </tr>
    </table>
</div>






@endsection



