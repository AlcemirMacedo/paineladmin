@extends('layouts.main_layout')

@section('links')
    <link rel="stylesheet" href="{{ asset('css/dash-frame.css') }}">
@endsection

@section('content')
    <div class="dash-fornecedor">
        <div class="pesq-field">
            <form action="" class="form-inline">
                <input type="text" class="form-control col-md-4" placeholder="Pesquisar por: Nome ou CPF ou CNPJ">
                <button type="submit" class="btn btn-secondary">Pesquisar</button>
                <div class="form-group col-md-6">
                    <div id="cloader"></div>
                    <h5 class="text-success text-center" id="txt">Gerando Recibo</h5>
                </div>
            </form>
        </div>
        <table class="table table-striped table-light">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nº</th>
                    <th scope="col">CPF / CNPJ</th>
                    <th scope="col">NOME / EMPRESA</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor R$</th>
                    <th scope="col">Data</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sql as $item)
                    <form action="/baixarpdf" method="POST" onsubmit="showLoader()">
                        @csrf
                        @php
                            $valorFormatado = number_format($item->valor_recibo, 2, ',', '.');
                        @endphp
                        <tr>
                            <th scope="row">{{ $item->id_recibo }}<input type="hidden" placeholder="{{ $item->id_recibo }}" name="id" value="{{ $item->id_recibo }}" readonly></th>
                            <td>{{ $item->num_recibo }}<input type="hidden" placeholder="{{ $item->num_recibo }}" value="{{ $item->num_recibo }}" name="numero" readonly></td>
                            <td>{{ $item->cpfcnpj_recibo }}<input type="hidden" placeholder="{{ $item->cpfcnpj_recibo }}"  value="{{ $item->cpfcnpj_recibo }}" name="cpfcnpj" readonly></td>
                            <td class="name_forn">{{ $item->nome }}<input type="hidden" placeholder="{{ $item->nome }}" value="{{ $item->nome }}" name="nome" readonly></td>
                            <td class="desc_forn">{{ $item->desc_recibo }}<input title="{{ $item->desc_recibo }}" type="hidden" placeholder="{{ $item->desc_recibo }}" value="{{ $item->desc_recibo }}" name="descricao" readonly></td>
                            <td>{{ $valorFormatado }}<input type="hidden" placeholder="{{ $valorFormatado }}" value="{{ $valorFormatado }}" name="valor" readonly></td>
                            <td>{{ $item->data_recibo }}<input type="hidden" placeholder="{{ $item->data_recibo }}" value="{{ $item->data_recibo }}" name="data" readonly></td>
                            <input type="hidden" placeholder="{{ $item->vlr_extenso }}" value="{{ $item->vlr_extenso }}" name="vlr_extenso">
                            <td>
                                <button title="Baixar" class="baixar-bot" type="submit" style="color: rgb(22, 186, 85)">
                                    <i class="bi bi-box-arrow-down"></i>
                                </button>|
                                <a href="/formrecibo/{{ $item->id_recibo }}" class="edit-bot" style="color: rgb(22, 141, 225)" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a> |
                                <a class="excluir-bot" title="Excluir" href="/exluirrecibo/{{ $item->id_recibo }}">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </form>
                @endforeach
            </tbody>
        </table>
        @php
        $paginator = $sql
        @endphp
        @if ($paginator->hasPages())
            <ul class="pagination"> {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="disabled" aria-disabled="true"><span>&laquo; Anterior</span></li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Anterior</a></li>
                @endif {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Próximo &raquo;</a></li>
                @else
                    <li class="disabled" aria-disabled="true"><span>Próximo &raquo;</span></li>
                @endif
            </ul>
        @endif


    </div>

    <script type="text/javascript">
        function showLoader(){
            document.getElementById('txt').classList.toggle('view');
            document.getElementById('cloader').classList.toggle('loadActive');

            setTimeout(() => {
                document.getElementById('txt').classList.toggle('view');
                document.getElementById('cloader').classList.toggle('loadActive');
            }, 5000);
        }

    </script>
@endsection




