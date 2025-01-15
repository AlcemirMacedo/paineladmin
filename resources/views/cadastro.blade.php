@extends('layouts.main_layout')



@section('content')

<br>
<form action="/cadastrar" method="POST">

    @csrf
    <label for="fullname">Nome Completo</label>
    <input type="text" name="fullname">
    <br>
    <label for="usuario">Usuário</label>
    <input type="text" name="usuario">
    <br>
    <label for="email">E-mail</label>
    <input type="email" name="email">
    <br>
    <label for="senha">Senha</label>
    <input type="password" name="senha">
    <br>
    <button type="submit">Cadastrar</button>
    <hr>
    <a href="/">Voltar</a><br>
</form>
<img src="{{ asset('img/assinatura.png') }}" alt="">

@endsection
