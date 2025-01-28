@extends('layouts.main_layout')


{{--  --}}

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

@if (Session::has('success'))
    <script>
        swal({
            title: "Tudo certo!",
            text: "{{ Session::get('success') }}",
            icon: "success"
        })
    </script>
@endif

@if (Session::has('error'))
    <script>
        swal({
            title: "Mensagem de erro",
            text: "{{ Session::get('error') }}",
            icon: "error"
        })
    </script>
@endif

@foreach ($sql as $item)
@endforeach

<div class="container">
    <h1 class="text-center">Cadastro de Funcionários</h1>
    <hr>
    <form action="/cadastrofuncionario" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Nome</label>
                <input type="hidden" name="id" value="{{ $item->id_funcionario }}">
                <input class="form-control" type="text" name="nome" value="{{ $item->nome_funcionario }}">
            </div>
            <div class="form-group col-md-6">
                <label>Cargo</label>
                <input class="form-control" type="text" name="cargo" value="{{ $item->cargo_funcionario}}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>CPF ou CNPJ</label>
                <input class="form-control" maxlength="18" oninput="mascararDocumento(this)" type="text" name="cpfcnpj" value="{{ $item->cpf_funcionario }}" >
            </div>
            <div class="form-group col-md-8">
                <label>Endereço</label>
                <input class="form-control" type="text" name="endereco" value="{{ $item->end_funcionario }}" >
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Email</label>
                <input class="form-control" type="email" name="email" value="{{ $item->email_funcionario }}">
            </div>
            <div class="form-group col-md-4">
                <label>Contato</label>
                <input class="form-control" type="text" name="telefone" value="{{ $item->contato_funcionario }}" oninput="mascaraTelefone(this)">
            </div>
        </div>

        <div class="form-row">
            <button type="submit" class="btn btn-success col-md-2">Salvar</button>
            <a onclick="window.history.back()" class="btn btn-light col-md-2" style="margin-left: 10px">Voltar</a>
        </div>
    </form>
</div>

    @if ($errors -> any())
        <script>
            swal({
                title: "Mensagem de erro",
                text: "{{ implode('\n', $errors->all()) }}",
                icon: "error"
            })
        </script>
    @endif


{{-- Máscara de CPF e CNPJ --}}
<script> function mascararDocumento(input)
    {
        let value = input.value.replace(/\D/g, '');
        if (value.length <= 11)
            {
                input.value = value.replace(/(\d{3})(\d)/, '$1.$2') .replace(/(\d{3})(\d)/, '$1.$2') .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            }
        else
            {
                input.value = value.replace(/^(\d{2})(\d)/, '$1.$2') .replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3') .replace(/\.(\d{3})(\d)/, '.$1/$2') .replace(/(\d{4})(\d{1,2})$/, '$1-$2');
            }
    }
</script>

{{-- Máscara de CEP --}}
<script>

        function mascaraCep(input) {
            // Remove qualquer caractere que não seja um número
            let cep = input.value.replace(/\D/g, '');

            // Aplica a máscara de CEP
            if (cep.length > 5) {
                cep = cep.slice(0, 5) + '-' + cep.slice(5);
            }

            // Atualiza o valor do input com o CEP mascarado
            input.value = cep;
        }


</script>

{{-- Máscara de Telefone --}}
<script>
    function mascaraTelefone(input) {
        // Remove qualquer caractere que não seja um número
        let telefone = input.value.replace(/\D/g, '');

        // Aplica a máscara de telefone
        if (telefone.length > 10) {
            telefone = telefone.replace(/^(\d{2})(\d{5})(\d{4}).*/, "($1) $2-$3");
        } else if (telefone.length > 5) {
            telefone = telefone.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, "($1) $2-$3");
        } else if (telefone.length > 2) {
            telefone = telefone.replace(/^(\d{2})(\d{0,5})/, "($1) $2");
        } else if (telefone.length > 0) {
            telefone = telefone.replace(/^(\d{0,2})/, "($1");
        }

        // Atualiza o valor do input com o telefone mascarado
        input.value = telefone;
    }
</script>


@endsection
