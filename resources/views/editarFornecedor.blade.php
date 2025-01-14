@extends('layouts.main_layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/dash-frame.css') }}">
@endsection
@section('content')

@foreach ($sql as $item)

@endforeach
<div>
    <h1>{{ $item->nome }}</h1>
    <br>
    <h1>{{ $item->cidade }}</h1>
</div>


@endsection




